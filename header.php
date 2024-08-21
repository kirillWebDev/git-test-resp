<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<?php wp_head(); ?>
<!-- 	function sortByMarksDescending(jsonString) {
		  // Yоur cоdе gоеs hеrе
			var arr = JSON.parse(jsonString)
			var sortedArr = []
			var newSortedArr = []
			var sortedArr = []
			var numbers = []
			arr.forEach(function(value,index){
				sortedArr[value.mark] = value
			})
			sortedArr.sort((a, b) => a.distance - b.distance).reverse()
			sortedArr.forEach(function(value,index){
				newSortedArr.push(value)
			})
			return JSON.stringify(newSortedArr)
		} -->

<!-- 		select t1.name, t2.age
		from `people` t1
		inner join `people` t2
		on t2.fatherId = t1.id 
		OR t2.motherId = t1.id
		WHERE t2.age = ( SELECT MIN(`people`.age) FROM `people` ) -->
	<script type="text/javascript">

		// var jsonStr = '[{"name": "John", "mark": 101}, {"name": "John", "mark": 102}, {"name": "Alice", "mark": 90}, {"name": "Aliceee", "mark": 87}, {"name": "Bob", "mark": 88}, {"name": "Mike", "mark": 91}, {"name": "QWE", "mark": 100}, {"name": "asdfaf", "mark": 50}]';
		
		// Sum Numbers
		// function sum (numbers) {
		//     "use strict";
		//     var sum = 0;
		//     var isNumberExists = numbers.find((element, index, array) => { return typeof element === 'number' })
		  
		//     if ( !numbers.length || !isNumberExists )
		//       return sum
		    
		    
		//     numbers.forEach((elem) => {
		//       sum+=elem
		//     })
		    
		//     return sum
		// };

		function likes(names) {
		    var stringSingle = ' likes this'
		    var stringMult = ' like this'

		    if ( names.length == 0 )
		      return 'no one'+stringMult
		    
		    var result = ''
		      if ( names.length == 1 ) {
		      	result = names[0] + stringSingle
		      }
		      if ( names.length == 2 ) {
		      	result = names[0] + ' and ' + names[1] + stringMult
		      }

		      if ( names.length == 3 ) {
		      	result = names[0] + ', ' + names[1] + ' and ' + names[2] + stringMult
		      }

		      if ( names.length > 3 ) {
		      	let count = names.length - 2
		      	result = names[0] + ', ' + names[1] + ' and ' + count + ' others' + stringMult
		      }

		    // names.forEach((name, i)=>{
		      
		    //   if ( names.length == 1 ) {
		    //   	result = name + stringSingle
		    //   }

		    //   if ( names.length == 2 ) {
		    //   	result = result+name + ', '
		    //   }
		       
		    // })
		  
		  return result
		} 

		console.log(likes([]));
		console.log(likes(['Peter']));
		console.log(likes(['Jacob', 'Alex']));
		console.log(likes(['Max', 'John', 'Marфk']));
		console.log(likes(['Alex', 'Jacob', 'Mark', 'Max']))
		console.log(likes(['Alex', 'Jacob', 'Mark', 'Max', 'OIMOKMLMK']))
		console.log(likes(['Alex', 'Jacob', 'Mark', 'Max', 'OIMOKMLMK']))

	</script>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

	<header class="header">
		<div class="header_main_row">
			<h1 class="logo_wrap header_mod"><a href="<?php echo home_url() ?>" class="logo_text header_mod">MoGo</a></h1>
		</div>
		<div class="menu_trigger_wrap">
			<div id="menu_trigger" class="menu_trigger"><span class="menu_trigger_decor"></span></div>
		</div>
		<nav class="header_menu_row">
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'menu_class'      => 'menu-wrapper',
						'container_class' => 'primary-menu-container',
						'items_wrap'      => '<ul id="primary-menu-list" class="header_menu_list">%3$s</ul>',
						'fallback_cb'     => false,
					)
				);
			?>
		</nav>
	</header>
	<div class="wrapper">
	  <div class="base">