 
<!DOCTYPE html>
<html>
<head>

	<title>
		ToDo Item
	</title>
  
	<link rel="stylesheet" type="text/css" href="todo.css">
	
</head>
<body> 
 
	<div class="container">
    <header class="text-center text-light my-4">
      <h1 class="mb-4">Todo List</h1>
      <form class="search">
        <input class="form-control m-auto" type="text" name="search" placeholder="search todos" />
      </form>
    </header> <br><hr>
     <ul class="list-group todos mx-auto text-light">
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>play Cricket</span>
        <span class="delete">×</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>Study at 2pm</span>
        <span class="delete">×</span>
      </li>
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>Had Breakfast</span>
        <span class="delete">×</span>
      </li>
    </ul>
    <form class="add text-center my-4">
      <label class="text-light"><h2>Add New ToDo</h2></label><hr><br>
      <input class="form-control m-auto" type="text" name="add" />
    </form>  
  
</div>
<script type="text/javascript">
	const addForm = document.querySelector(".add");
let list = document.querySelector(".todos");
const search = document.querySelector(".search > .form-control");

const generateTemplate = (todo) => {
  const item = `
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <span>${todo}</span>
        <span class="delete">×</span>
      </li>`;
  list.innerHTML += item
};

addForm.addEventListener("submit", (e) => {
  e.preventDefault();
  
  const todo = addForm.add.value.trim();
  if(todo.length) {
    generateTemplate(todo)
    addForm.reset()
  }
  
});

// Delete todo

list.addEventListener('click', e => { 

  if(e.target.classList.contains('delete')) {
    e.target.parentElement.remove()
  }
})

// filter todos
const filterTodo = term => {
  Array.from(list.children)
    .filter(todo => !todo.textContent.toLowerCase().includes(term))
    .forEach(todo => todo.classList.add('filtered'));
  
  Array.from(list.children)
    .filter(todo => todo.textContent.toLowerCase().includes(term))
    .forEach(todo => todo.classList.remove('filtered'));
}
search.addEventListener('keyup', () => {
  const term = search.value.trim().toLowerCase()
  filterTodo(term)
})
</script>



</body>
</html>