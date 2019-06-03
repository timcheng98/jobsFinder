@extends('layouts.app')

@section('content')
<div class="container col-md-11">
    <br>
        <div class="col-md-11 col-sm-12 category-item category-name">
          <h1 class="font-weight-bold">Job Category</h1><hr>       
            @foreach ($categories as $category)       
              <a href="search/findjob/<?php echo preg_replace('/(\s+)|(\/+)/','',$category->name); ?>/{{ $category->id}}">
                <h5 class="text-white btn btn-info btn-lg" style="margin-right:1%">
                  {{$category->name}} 
                </h5>
              </a>
            @endforeach  
        </div>     
    </div> 
    <br>
   
        <? for($i = 0; $i < sizeof($categories) ; $i++)  : ?>
        <? if ( $i % 7 == 0) : ?> 
        <div class="category-grid">  
    <div class="category-grid-item ">
        <?   
            if ($i  < sizeof($categories)) {
       
                $category = preg_replace('/(\s+)|(\/+)/','',$categories[$i]['name']);
                $category_id = $categories[$i]['id'];
                $url = 'search/findjob/'.$category.'/'.$category_id;        
                echo '<span><a href="'.$url.'">'.$categories[$i]['name'].'</a></span>';
                }  
                 else echo '';
        ?>
            </div>
    <div class="category-grid-item " >
        <?
            if ($i + 1 < sizeof($categories)) {
        
                $category = preg_replace('/(\s+)|(\/+)/','',$categories[$i + 1]['name']);
                $category_id = $categories[$i + 1]['id'];
                $url = 'search/findjob/'.$category.'/'.$category_id;        
                echo '<span><a href="'.$url.'">'.$categories[$i + 1]['name'].'</a></span>';
                }  
                 else echo '';
        ?>
            </div>
            <div class="category-grid-item grid-item-3" >
                    <? 
             if ($i +2  < sizeof($categories)) {
          
                $category = preg_replace('/(\s+)|(\/+)/','',$categories[$i + 2]['name']);
                $category_id = $categories[$i + 2]['id'];
                $url = 'search/findjob/'.$category.'/'.$category_id;        
                echo '<span><a href="'.$url.'">'.$categories[$i + 2]['name'].'</a></span>';
                }  
                 else echo '';
                     ?>
            </div>
            <div class="category-grid-item grid-item-4 ">
                    <? 
             if ($i +3 < sizeof($categories)) {
           
                $category = preg_replace('/(\s+)|(\/+)/','',$categories[$i + 3]['name']);
                $category_id = $categories[$i +3]['id'];
                $url = 'search/findjob/'.$category.'/'.$category_id;        
                echo '<span><a href="'.$url.'">'.$categories[$i + 3]['name'].'</a></span>';
                }  
                 else echo '';
                    ?>
            </div>
            <div class="category-grid-item" >
             <? 
            if ($i +4 < sizeof($categories)) {
              
                $category = preg_replace('/(\s+)|(\/+)/','',$categories[$i + 4]['name']);
                $category_id = $categories[$i + 4]['id'];
                $url = 'search/findjob/'.$category.'/'.$category_id;        
                echo '<span><a href="'.$url.'">'.$categories[$i + 4]['name'].'</a></span>';
                }  
                 else echo '';
                        ?>
            </div>
            <div class="category-grid-item grid-item-6" >
                    <? 
            if ($i +5 < sizeof($categories)) {
     
                $category = preg_replace('/(\s+)|(\/+)/','',$categories[$i + 5]['name']);
                $category_id = $categories[$i + 5]['id'];
                $url = 'search/findjob/'.$category.'/'.$category_id;        
                echo '<span><a href="'.$url.'">'.$categories[$i + 5]['name'].'</a></span>';
                }  
                 else echo '';
                     ?>
            </div>
            <div class="category-grid-item" >              
                <? 
            if ($i + 6 < sizeof($categories) ) {
         
                $category = preg_replace('/(\s+)|(\/+)/','',$categories[$i + 6]['name']);
                $category_id = $categories[$i + 6]['id'];
                $url = 'search/findjob/'.$category.'/'.$category_id;        
                echo '<span><a href="'.$url.'">'.$categories[$i + 6]['name'].'</a></span>';
                }  
                 else echo '';
                        
                ?>
            </div>
        </div>
    
      
        <? endif ; ?>
    <? endfor; ?>

    <a class="prev" onclick="preSlides(1)">❮1</a>
    <a class="next" onclick="nextSlides(1)">❯</a>


<script>
    const categoryGrids = document.querySelectorAll('.category-grid');
    const categoryGridItems = document.querySelectorAll('.category-grid-item');
    /* initial */
    categoryGrids[0].classList.add('show');

    addItemImage();

 
    function addItemImage() {
        categoryGridItems.forEach(item => {
            item.classList.add('item-image');
        });
        const imageItems = document.querySelectorAll('.item-image');
            for(let i = 0; i < categoryGrids.length; i++) {  
                for(let j = 0; j < 7; j++) {  
                    let index = 7 * i + j
                imageItems[index].style= `background-image:url('{{asset('storage/bg-category/item-${i}/item-${j}.jpg')}}')`; 
                }    
            }
        }

    function preSlides(pre) {
        let index;
        categoryGrids.forEach( (item, i) => {
            if ( item.classList.contains('show') )        
              return index = i;
        });

        if(index == 0) 
            return;
        else {
            categoryGrids[index].classList.remove('show');
            categoryGrids[index-pre].classList.add('show','w3-animate-right');
        }
    }

    function nextSlides(next) {
        let index;
        categoryGrids.forEach( (item, i) => {
            if ( item.classList.contains('show') )        
              return index = i;
        });
   
        if(index + next > categoryGrids.length - 1)  
            return;
        else {
            categoryGrids[index].classList.remove('show');
            categoryGrids[index+next].classList.add('show', 'w3-animate-right');
        }
    }

</script>
  
@endsection