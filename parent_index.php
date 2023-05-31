<?php include('partial/parent_header.php');?>

<style>
    .profile
    {
        border-radius:50%;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
    height: 100px;
    width: 100px;
    outline: black;
    /* background-size: 100%, 100%;
    border-radius: 50%;
    border: 1px solid black; */
    background-image: none;
    }

    .carousel-control-next-icon:after
    {
    content: '>';
    font-size: 100px;
    color: #702963;
    }

    .carousel-control-prev-icon:after {
    content: '<';
    font-size: 100px;
    color: #702963;
    }
</style>

<br><br><br><br><br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="100000">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="container">
    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <div><img src="img/1398Mavie Elissa M. Maningo.JPG" alt="students-pic" class="profile"></div>
                </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <div style="width:50%">
                            <table style="width:100%">
                                <tr>
                                    <th>time</th>
                                    <th>status</th>
                                    <th>location</th>
                                </tr>
                                <tr>
                                    <td>11:16</td>
                                    <td>logged in</td>
                                    <td>Gate 4</td>
                                </tr>
                                <tr>
                                    <td>12:16</td>
                                    <td>logged out</td>
                                    <td>Gate 1</td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
    </div>
    <div class="carousel-item">
      <H1>HEADER1</H1>
    </div>
    <div class="carousel-item">
      <H3>HEADER3</H3>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<br><br><br><br>
<?php include('partial/parent_footer.php');?>