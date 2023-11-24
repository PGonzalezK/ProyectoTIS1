<?php 
     $id = $_GET['id'];
     $id = filter_var($id, FILTER_VALIDATE_INT);
    //importar la bd
    include("database/connection.php");
    //consultar db
    $query = "SELECT * FROM noticias WHERE idNoticia = ${id}";
    //resultado db
    $resultado = mysqli_query($connection, $query);

    if(!$resultado-> num_rows){
        header('Location: ../../../index.php');
    }

    $noticia = mysqli_fetch_assoc($resultado);

?>
    <div class="row">
        <div class="col">

        </div>
        <?php require('includes/users/navbar_users.php'); ?>

    </div>
    <div class="d-inline-flex p-2 flex-column ">
        <h1><?php echo  $noticia['titulo']?></h1>
            <div class=" p-3">
                <img src="pages/admin/noticias_adm/imagenes/<?php echo $noticia['imagen'];?>" class="card-img-top" width="300" height="500">
            </div>
            <div class="p-3">
                <p> <?php echo $noticia['descripcion']?></p>   
            </div>
    </div>

<?php
    mysqli_close($connection);
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="../vendor/emoji-picker/lib/css/emoji.css" rel="stylesheet">
	<link href="..//css/styles.css" rel="stylesheet">
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="../vendor/emoji-picker/lib/js/config.js"></script>
    <script src="../vendor/emoji-picker/lib/js/util.js"></script>
    <script src="../vendor/emoji-picker/lib/js/jquery.emojiarea.js"></script>
    <script src="../vendor/emoji-picker/lib/js/emoji-picker.js"></script>
	





<section id="jjjd" class="section">
	<div class="container">
		<div class="row">

			<div class="col-12">
				<!-- section title -->
				
			
			<br>
			<br>

				<h3>Comentario</h3>
				<p>Cuentanos tu opinion acerca de esta noticia</p>
					<br>	

			<!-- Contact Details -->
			<div class="contact-info col-lg-6 wow fadeInUp" data-wow-duration="500ms">
			
	

<form id="frm-comment">
<div class="input-row">
<label for="comme" class="form-label">Comentario:</label>
    <p class="emoji-picker-container">
      <textarea rows="6" class="form-control" 
	  type="text" name="comentario" id="comentario" placeholder="Agregue su comentario" required></textarea>
    </p>
</div>

<div>
    <input type="button" class="btn btn-primary " id="submitButton" value="Agregar Comentario" />

</div>
<br>
<div id="comment-message">¡Tu comentario se agrego!</div>

</form>
</div><div id="output"></div>

</div>

				</form>
			</div>
			</div>
			
					
			<!-- / End Contact Details -->

			<!-- Contact Form -->
		
<script>

function postReply(post) {
	$('#post').val(post);
	$("#nombre").focus();
}

$("#submitButton").click(function () {
	$("#comment-message").css('display', 'none');
	var str = $("#frm-comment").serialize();

	$.ajax({
		url: "AgregarComentario.php",
		data: str,
		type: 'post',
		success: function (response)
		{
			$("#comment-message").css('display', 'inline-block');
			$("#nombre").val("");
			$("#comentario").val("");
			$("#post").val("");
			listComment();
		}
		
	});
});

$(document).ready(function () {
	listComment();
});

$(function () {
	// Initializes and creates emoji set from sprite sheet
	window.emojiPicker = new EmojiPicker({
		emojiable_selector: '[data-emojiable=true]',
		assetsPath: '../vendor/emoji-picker/lib/img/',
		popupButtonClasses: 'icon-smile'
	});

	window.emojiPicker.discover();
	
});


function listComment() {
$.post("ListaComentario.php",
function (data) {
	var data = JSON.parse(data);

	var comments = "";
	var replies = "";
	var item = "";
	var parent = -1;
	var results = new Array();

	var list = $("<ul class='outer-comment'>");
	var item = $("<li>").html(comments);

	for (var i = 0; (i < data.length); i++)
	{
		var post = data[i]['id'];
		parent = data[i]['respuesta'];

		if (parent == "0")
		{
			comments =  "<div class='comment-row'>"+
			"<div class='comment-info'><img src='user.png' width='50px'><span class='posted-by'>" + data[i]['nombre'].toUpperCase() + "</span></div>" + 
			"<div class='comment-text'>" + data[i]['comentarios'] + "</div>"+
			"<div><a class='btn-reply' onClick='postReply(" + post + ")'>Responder</a></div>"+
			"<div class='comment-text'>" + data[i]['fecha'] + "</div>"+"</div>";
			var item = $("<li>").html(comments);
			list.append(item);
			var reply_list = $('<ul>');
			item.append(reply_list);
			listReplies(post, data, reply_list);
		}
	}
	$("#output").html(list);
	
});
}

function listReplies(post, data, list) {

	for (var i = 0; (i < data.length); i++)
	{
		if (post == data[i].respuesta)
		{
			var comments = "<div class='comment-row'>"+
			" <div class='comment-info'><img src='user.png' width='50px'><span class='posted-by'>" + data[i]['nombre'].toUpperCase() + " </span></div>" + 
			"<div class='comment-text'>" + data[i]['comentarios'] + 
			"<div class='comment-text'>" + data[i]['fecha'] + "</div>"+
			"<div><a class='btn-reply' onClick='postReply(" + data[i]['id'] + ")'>Responder</a></div>"+
			"</div>";
			var item = $("<li>").html(comments);
			var reply_list = $('<ul>');
			list.append(item);
			item.append(reply_list);
			listReplies(data[i].id, data, reply_list);

		}
	}  
}
</script>

			<!-- ./End Contact Form -->

		</div> <!-- end row -->
	</div> <!-- end container -->

</section> <!-- end section -->
