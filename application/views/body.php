<main>
		<h2>À propos du gabarit 01</h2>
		<h3>Code HTML et CSS</h3>
		<p>Ce gabarit est structuré de la manière suivante:</p>
<pre><code>&lt;div id="global"&gt;
	&lt;div id="entete"&gt;...&lt;/div&gt;
	&lt;div id="navigation"&gt;...&lt;/div&gt;
	&lt;div id="contenu"&gt;...&lt;/div&gt;
	&lt;div id="pied"&gt;...&lt;/div&gt;
&lt;/div&gt;</code></pre>
		<p>Il est mis en forme par deux feuilles de styles:</p>
		<ol>
			<li><a href="styles/base.css">base.css</a> (mise en forme minimale
			du texte, commune à tous les gabarits)</li>
			<li><strong><a href="styles/modele01.css">modele01.css</a></strong>,
			qui contient tous les styles propres à ce gabarit, et que nous vous
			invitons à consulter.</li>
		</ol>
		<p>Pour voir le détail du code HTML de cette page, utilisez la fonction
		d'affichage de la source de votre navigateur web (ex: «Affichage &gt;
		Code source de la page»).</p>
		<h3>À noter</h3>
		<p>Ce gabarit est très simple, et ne devrait pas nécessiter moult
		explications. Deux points sont à noter tout de même:</p>
		<ol>
			<li>
				<p>Le menu de navigation est <strong>horizontal</strong>,
				alors que nous avons utilisé une liste non ordonnée (élément
				HTML <code>ul</code>)pour le coder (voir le code HTML).
				Comment se fait-ce?<br />
				Ici, on obtient cette disposition grâce à la déclaration CSS
				<code>display: inline;</code>, appliquée aux items de liste
				(éléments HTML <code>li</code>).
				</p>
			</li>
			<li>
				<p>Le principal <strong>problème</strong> de ce gabarit, mis
				à part son aspect très frustre, c'est que l'on place tout le
				contenu dans un bloc qui prend 100% de la largeur de la
				fenêtre du navigateur (avec 20px de padding à gauche et à
				droite). Pour les petites résolutions (appareils mobiles,
				écrans en 800&times;600&hellip;), c'est très bien, voire
				même idéal. Mais en 1024&times;768 et pour les résolutions
				supérieures, cela peut donner des choses illisibles avec des
				<strong>lignes de texte interminables</strong>!</p>
				<p>D'ailleurs, il est probable que vous soyez arrivé au même
				constat rien qu'en tentant de lire ces explications sur votre
				propre écran!</p>
				<p>Ce problème est moins fort dans le cas d'un design sur deux
				ou trois colonnes. Et, dans tous les cas, on peut l'éviter en
				travaillant avec une <strong>largeur fixe</strong> (par
				exemple 750px ou 900px), ou encore avec une <strong>largeur
				fluide «intelligente»</strong> (voir les gabarits qui portent
				cette mention).</p>
			</li>
		</ol>
</main>
