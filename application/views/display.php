<main>
    <section>
        <h2 class="text-center">Tâches</h2>
        <?php if (count($tasks) <= 0) { ?>
            <p>Vous n'avez prévu aucune tâche.</p>
        <?php } else { foreach ($tasks as $task): ?>
        <div class="todo">
            <div>
                <?= $task->content ?>
            </div>
            <div class="text-right show-on-parent-hover">
                <a class="button" href="<?= site_url('todolist/delete?task='.$task->id) ?>">
                    <i class="fa fa-check"></i>
                </a>
                <a class="button" href="<?= site_url('todolist/priority?task='.$task->id.'&change=up') ?>">
                    <i class="fa fa-arrow-up"></i>
                </a>
                <a class="button" href="<?= site_url('todolist/priority?task='.$task->id.'&change=down') ?>">
                    <i class="fa fa-arrow-down"></i>
                </a>
            </div>
        </div>
    <?php endforeach; } ?>
    </section>
    <section>
        <h2 class="text-center">Nouvelle tâche</h2>
        <?php
            if (isset($error))
                echo $error;
        ?>
        <?= form_open('todolist') ?>
        <?php $content = [
            'name' => 'content',
            'id' => 'content',
            'placeholder' => 'Tâche',
            'value' => set_value('content')
        ]; ?>
        <?= form_textarea($content) ?>
        <p class="text-center">
            <?= form_submit('new_task', 'Valider') ?>
        </p>
        <?= form_close() ?>
    </section>
</main>
