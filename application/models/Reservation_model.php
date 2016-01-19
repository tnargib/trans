<?php

class Todolist_model extends CI_Model
{
    public $tasks = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model', '', TRUE);

        if ($this->User_model->connected)
        {
            $this->tasks = $this->db
                ->order_by('priority', 'DESC')
                ->get_where('tasks', ['user_id' => $this->User_model->id])
                ->result_object();
        }
    }

    public function create_task($content)
    {
        if ($this->User_model->connected)
        {
            $last_task_priority = $this->db->select_max('priority')->get_where('tasks', [
                'user_id' => $this->User_model->id
            ])->unbuffered_row()->priority;

            if ($last_task_priority == NULL)
                $last_task_priority = 0;
            else
                $last_task_priority++;

            $q = $this->db->insert('tasks', [
                'user_id' => $this->User_model->id,
                'priority' => $last_task_priority,
                'content' => $content
            ]);

            return $q;
        }

        return FALSE;
    }

    public function delete_task($task_id)
    {
        if ($this->User_model->connected)
        {
            $this->db->delete('tasks', [
                'user_id' => $this->User_model->id,
                'id' => $task_id
            ]);
        }
    }

    public function change_task_priority($task_id, $change)
    {
        if ($this->User_model->connected)
        {
            if ($change == 'up' || $change == 'down')
            {
                $task = $this->db->get_where('tasks', [
                    'user_id' => $this->User_model->id,
                    'id' => $task_id
                ])->unbuffered_row();
                if ($task)
                {
                    $previous_task = $this->db
                        ->where('user_id', $this->User_model->id)
                        ->where('priority '.($change == 'up' ? '>' : '<'), $task->priority)
                        ->order_by('priority', ($change =='up' ? 'ASC' : 'DESC'))
                        ->limit(1)
                        ->get('tasks')->unbuffered_row();

                    if ($previous_task)
                    {
                        $this->db->where('id', $task->id)
                            ->update('tasks', [
                                'priority' => $previous_task->priority
                            ]);

                        $this->db->where('id', $previous_task->id)
                            ->update('tasks', [
                                'priority' => $task->priority
                            ]);

                        return TRUE;
                    }
                }
            }
        }

        return FALSE;
    }
};
