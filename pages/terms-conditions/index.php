 <section class="bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 col-lg-9 col-md-11">
<?php
$abc=1;
$query = mysql_query("SELECT * FROM content where category_content = 'Terms'"); //get the data that will be updated
while($dt = mysql_fetch_array($query)){
?>                
            <div class="card card-body shadow">
              <div class="d-flex flex-column justify-content-between align-items-start pb-4 mb-4 mb-md-5 border-bottom">
                <div class="mb-3">
                  <h1 class="mb-2">Terms of Service</h1>
                  <div class="lead">Updated <?= $dt['tanggal_upload'];?></div>
                </div>
              </div>
              <article class="article">
                 
            <?= $dt['page_content'];?>


              </article>
            </div>
<?php } ?>             
          </div>
        </div>
      </div>
    </section>