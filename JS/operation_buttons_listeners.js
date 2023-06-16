const remove_button = document.querySelectorAll('.remove_button');

remove_button.forEach(element => {
	element.addEventListener('click', (event) => {
		id = event.currentTarget.value;
		
		console.log(id); 
		// https://sebhastian.com/call-php-function-from-javascript/
		
		/* Estou tentando executar o remove_plant.php atrav�s do js, quando o bot�o � clicado */
		fetch('http://localhost/gerenciamento-da-horta/operations/remove_plant.php', {
			method: "POST",
			headers: {
				"Content-type": "application/x-www-form-urlencoded; charset=UTF-8",
			},
			body: `id=${id}`,
		})
		.then(() => window.location.reload()); // Atualizar a p�gina pode n�o ser algo bom quanto a performance. Remover o item deletado manipulando o DOM talvez seja uma solu��o melhor
											   // https://blog.devgenius.io/using-fetch-to-update-the-database-and-dom-without-refreshing-the-page-3f05c343166b
	});
});

