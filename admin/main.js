var admin = (function(){
	return function(){
		alert(122);
	}

	function ss(cc){
		return cc;
	}
})();


$(document).ready(function() {
	var id;
	var title;
	var confirm;
	var action_post;

	$('.modal').modal({
	      dismissible: true, // Modal can be dismissed by clicking outside of the modal
	      opacity: .5, // Opacity of modal background
	      inDuration: 300, // Transition in duration
	      outDuration: 200, // Transition out duration
	      startingTop: '4%', // Starting top style attribute
	      endingTop: '10%', // Ending top style attribute
	      ready: function(modal, trigger) { // Callback for Modal open. Modal and trigger parameters available.
	        //alert("Ready");
	      },
	      complete: function()
				{
					if(confirm){
						$.post(action_post)
						confirm = false;
					}
				} // Callback for Modal close
	    }
	  );

	$('.delete_post').on("click", function(){
		id = $(this).data("id");
		title = $(this).data("title");
		action_post = {
			url : 'ajax.php',
			method : 'POST',
			data : {'action' : 'delete_post', 'id' : id},
			success:function(response){
				$('#tr-'+id).remove();
				 Materialize.toast('Eliminado correctamente: '+ title, 4000);
			},
			error:function(){
				alert('Ha ocurrido un error.')
			}
		};

		$("#pre_message").html("¿Seguro que sea eliminar?");
		$("#pre_title").html(title);
		$('#modal1').modal('open');
	});

	$('.delete_category').on("click", function(){

		id = $(this).data("id");
		name = $(this).data("name");

		action_post = {
			url : 'ajax.php',
			method : 'POST',
			data : {'action' : 'delete_category', 'id' : id},
			success:function(response){
				$('#category-'+id).remove();
				 Materialize.toast('Categoria eliminada correctamente: '+name, 4000);
			},
			error:function(){
				alert('Ha ocurrido un error.');
			}
		};

		$("#pre_message").html("¿Seguro que sea eliminar? - <b>SE ELIMINARAN TODAS SUS POSTS/PELICULAS </b>");
		$("#pre_title").html($(this).data("name"));
		$('#modal1').modal('open');
	});



	$(".confirm").on("click", function(){
			confirm = true;
	});

	$('select').material_select();
});
