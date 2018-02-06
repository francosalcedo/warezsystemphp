<?php
if($_POST){

	// @Save post edit
	$save = [
		'name'			=>	$_POST['name'],
		'slug'			=>	slug($_POST['name']),
		'type'			=>	$_POST['type']
	];

	$s = $db->table('category')->insert($save);
}

?>

<script src="js/ckeditor.js"></script>
<script>
if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
	CKEDITOR.tools.enableHtml5Elements( document );

CKEDITOR.config.height = '400';
CKEDITOR.config.width = 'auto';

var initSample = ( function() {
	var wysiwygareaAvailable = isWysiwygareaAvailable(),
		isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

	return function() {
		var editorElement = CKEDITOR.document.getById( 'editor' );


/*			editorElement.setHtml(
				'ss'
			);
*/
		// Depending on the wysiwygare plugin availability initialize classic or inline editor.
		if ( wysiwygareaAvailable ) {
			CKEDITOR.replace( 'editor' );
		} else {
			editorElement.setAttribute( 'contenteditable', 'true' );
			CKEDITOR.inline( 'editor' );

			// TODO we can consider displaying some info box that
			// without wysiwygarea the classic editor may not work.
		}
	};

	function isWysiwygareaAvailable() {
		// If in development mode, then the wysiwygarea must be available.
		// Split REV into two strings so builder does not replace it :D.
		if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
			return true;
		}

		return !!CKEDITOR.plugins.get( 'wysiwygarea' );
	}
} )();


</script>

	<?php
		if($s){
			echo '<div style="width:100%;background-color:rgb(223, 54, 54);text-align:center;padding:20px;color:white;font-size:25px;">GUARDADO CORRECTAMENTE</div>';
		}
	?>

	<form action="index.php?m=add_category" method="post">
		<div class="input-field col s12">
			<input name="name" type="text" value="<?php echo $sql->title; ?>" class="validate">
			<label for="first_name">Nombre</label>
		</div>

		<div class="input-field col s12">
			<select name="type">
	      <option value="" disabled selected>Selecionar</option>
				<option value="category">Categoria - Post</option>
				<option value="movie">Peliculas</option>
	    </select>
	    <label>Categoria</label>
		</div>

		<div class="input-field col s12">
			<button class="btn" type="submit">Guardar!</button>
		</div>
	</form>

<script>
initSample();

</script>
