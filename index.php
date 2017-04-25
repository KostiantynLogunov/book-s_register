<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Library of books</title>
	<link rel="stylesheet" type="text/css" href="css/main.css" charset="utf-8">
	<meta name="description" content="реєстр книг бібліотеки">
	<meta name="keywords" content="книги, books">
	<link rel="shortcut icon" type="image/x-icon" href="img/book.ico"> 
</head>

<style>
	table, td{
		border: 1px solid black;
		border-collapse: collapse;
		padding: 5px;
	}

	fieldset{
		width: 12%;
	}
	.btns button{
		margin: 5px 15px;
	}
		.btns button:hover{
			cursor: pointer;
		}
</style>

<body>
 <hr>
	 <?php
	 	error_reporting(-1);
	 	$db = new PDO ('mysql:host=localhost;dbname=db_books', 'root','');
	 	$db->exec("SET NAMES UTF8");
	 	$query = $db->prepare("SELECT * FROM books");
	 	$query->execute();
	 	
	 	$apps= $query->fetchAll(PDO::FETCH_ASSOC);
	 	

	 	echo '<table>';
	 	echo '<tr>';
	 		echo '<td><b>id</b></td>';
	 		echo '<td><b>Автор</b></td>';
	 		echo '<td><b>Назва книги</b></td>';
	 		echo '<td><b>Рік видання</b></td>';
	 		echo '</tr>';
	 	foreach ($apps as $app) {
	 		echo '<tr>';
	 		// echo '<td><a href="">'.$app['id'].'</a></td>';
	 		echo '<td>'.$app['id'].'</td>';
	 		echo '<td>'.$app['author_name'].'</td>';
	 		echo '<td>'.$app['book_name'].'</td>';
	 		echo '<td>'.$app['book_year'].'</td>';
	 		echo '</tr>';
	 	}
	 	echo '</table>';
	 ?>
	 <form method="post" class="btns">
	 	<p>	<button type="submit" name="add">Добавити книгу</button>
			<button type="submit" name="del">Удалити книгу</button>
			<button type="submit" name="edit">Редагувати</button>	
	 	</p>
	 </form>
	<?
// ==================================================================================================
	if(isset($_POST['add'])){?>
		<fieldset>
			<legend>Реєстрація нової книги</legend>
			<form method="post">
	 			<p><input type="text" name="name-author" placeholder="Ім'я автора нової книги" required="required"></p>
	 			<p><input type="text" name="name-book" placeholder="Назва нової книги" required="required"></p>
	 			<p><input type="number" name="year-book" placeholder="Рік видання нової книги" required="required"></p>
	 			<p><button type="submit" name="add_save">Зберегти</button></p>
			</form>
		</fieldset>
				<?
	}
	
	elseif ( isset( $_POST['add_save'] ) ){
	// echo 'SAVE';
		$name_a = htmlentities(trim($_POST['name-author']));
		$name_b = htmlentities(trim($_POST['name-book']));
		$year_b = htmlentities(trim($_POST['year-book']));						
		$query = $db->prepare("INSERT INTO books (author_name, book_name, book_year) VALUES (:name_a, :name_b, :year_b)");
		$values = ['name_a'=>$name_a, 'name_b'=>$name_b, 'year_b'=>$year_b];
		$query->execute($values);
		//echo '<meta http-equiv="refresh" content="0; url=http://miha/">'; #Перегрузка сторінки
		 exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");				
	}		
// ==================================================================================================	 
	elseif (isset($_POST['del'])) { 
	// echo "DELLETE BOOK";?>				
		<fieldset>
			<legend>Видалення запису про книгу</legend>
			<form method="post">
				<p>Введіть id книги для видалення:</p>
				<p><input type="text" name="id" placeholder="id книги в списку"></p>
		 		<p><button type="submit" name="del_save">Видалити</button></p>
			</form>
		</fieldset><?
	}
	
	elseif (isset($_POST['del_save'])) {
		$id_b = htmlentities(trim($_POST['id']));
		$query = $db->prepare("DELETE FROM books WHERE id = '$id_b'");
		$query->execute();
		exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
	}
// ==================================================================================================
	elseif (isset($_POST['edit'])) {
	// echo "EDIT BOOK";
		?>
		<fieldset>
			<legend>Редагування запису про книгу</legend>
			<form method="post">
				<p>Введіть оновленні дані про книгу:</p>
				<p><input type="text" name="id" placeholder="id книги в списку" required="required"></p>
				<p><input type="text" name="name-author" placeholder="Оновлене ім'я автора" required="required"></p>
				<p><input type="text" name="name-book" placeholder="Оновлена назва книги" required="required"></p>
				<p><input type="number" name="year-book" placeholder="Оновлений рік книги" required="required"></p>
				<p><button type="submit" name="edit_save">Зберегти</button></p>
			</form>
		</fieldset><?
	}
	
	elseif (isset($_POST['edit_save'])) {
		$id_b = htmlentities(trim($_POST['id']));
		$name_a = htmlentities(trim($_POST['name-author']));
		$name_b = htmlentities(trim($_POST['name-book']));
		$year_b = htmlentities(trim($_POST['year-book']));
		$query = $db->prepare("UPDATE books SET author_name = '$name_a', book_name = '$name_b', book_year = '$year_b'  WHERE id = '$id_b'");
		$query->execute();
		exit("<meta http-equiv='refresh' content='0; url= $_SERVER[PHP_SELF]'>");
	}
		
		
	echo "<hr>";			
	// echo '<pre>';
	// 	print_r($_POST);
	// echo '</pre>';
	 //header("Location:index.php");
?>
		
</body>
</html>