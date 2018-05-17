<?php
// Template Name: Category POOOOO

get_header();

?>


<div class="header bg-black">
  <h2 class="text-center">Clothing Category Page</h2>
</div>

<div class="">
  <div class="row">
    <div class="col-sm-3 col-sm-offset-1 text-left">

      <form class="form" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">

        <div class="elements">
          <h3>Department</h3>
            <?php
              if( $terms = get_terms( 'clothes', 'orderby=name' ) ) : 
                echo '<select style="color: rgb(46, 48, 62);" name="categoryfilter"><option>Select category...</option>';
                foreach ( $terms as $term ) :
                  echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; 
                endforeach;
                echo '</select>';
              endif;

              echo '<br>';
            ?>

      <div class="row">
            <div class="col-sm-10 col-md-6">
               <h3>Colors</h3>
                  <input type="checkbox" name="blue" value="blue"><label>Blue</label><br/>
                  <input type="checkbox" name="red" value="red"><label>Red</label><br/>
                  <input type="checkbox" name="green" value="green"><label>Green</label><br/>
                <br>
            </div>
            <div class="col-sm-10 col-md-6">
                <h3>Sizes</h3>
                  <input type="checkbox" name="small" value="small"><label>Small</label><br/>
                  <input type="checkbox" name="medium" value="medium"><label>Medium</label><br/>
                  <input type="checkbox" name="large" value="large"><label>Large</label><br/>
                <br>
            </div>
            <div class="col-sm-12">
                <h3>Sort</h3>
                <h4>Price Range</h4>
                  <input type="text" name="price_min" placeholder="Min price" style="color: rgb(46, 48, 62);"/>
                  <input type="text" name="price_max" placeholder="Max price" style="color: rgb(46, 48, 62);"/>
                  <br>
            </div>
            <div class="col-sm-12">
                  <br>
                  <!--
                  <label>
                    <input type="radio" name="price" value="ASC" /> Price Low to High
                  </label>
                  <br>
                  <label>
                    <input type="radio" name="price" value="DESC" selected="selected" /> Price High to Low
                  </label>
                  <br>
                -->
                    <label>
                    <input type="checkbox" name="stock_status" /> Only show in stock items
                  </label>
                  <br>
                  <br>
                <button type="submit" name="submit" value="Apply" style="color: rgb(46, 48, 62);">Search</button>
                <input type="hidden" name="action" value="myfilter">
            </div>
          </div>
        </div>
        </form>
      </div>
      <div class="col-sm-7">
        <div class="row">
            <div id="response"></div>
        </div>
      </div>
  </div>
</div>


<style>
  .form {
    background-color: rgba(46, 48, 62, 0.8);
    color: #fff;
    font-family: sans-serif; 


  }
  .elements {
    padding: 10 0 10 10;
  }

  .thread-body {
    height: 300px;
    width: 200px;
    background-color: #222;
    color: #fff;
  }

 .temp {
    position: absolute;;
    top: 50%;
    left: 50%;
    transform: translate(50%, 50%);
 }

  </style>


<script type="text/javascript">
  $(document).ready(function () {

  jQuery(function($){
  $('#filter').submit(function(){
    var filter = $('#filter');
    $.ajax({
      url:filter.attr('action'),
      data:filter.serialize(), // form data
      type:filter.attr('method'), // POST
      beforeSend:function(xhr){
        filter.find('button').text('Processing...'); // changing the button label
      },
      success:function(data){
        filter.find('button').text('Apply filter'); // changing the button label back
        $('#response').html(data); // insert data
      }
    });
    return false;
  });
});
});

</script>