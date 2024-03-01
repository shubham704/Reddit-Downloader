<?php
  if (!empty($video_id)) {
    $poster_url = $poster[0];
    echo '<div id="result" class="container result">
    <h4 id="line" class="text-center mb-2">Your video is ready to download!</h4>
          <div class="tabs row">
         <div class="col-xs-12 col-sm-5 col-md-5 vid"><div class="poster"><img class="down_img img-fluid rounded d-block m-auto" src=" '.$poster_url.'<span class="icon icon-lable icon-cont icon-down"></span></div></div>
        <div class5="col-xs-12 col-sm-7 col-md-7">
        <div class="container-table100">
          <div class="wrap-table100">
            <div class="table">
              <div class="roww headerr">
                <div class="cell">File Type</div>
                <div class="cell">
                  Action
                </div>
              </div>';

    $check_720p = 'https://v.redd.it/' . $video_id . '/DASH_720.mp4?source=fallback';
    $v_720p = get_headers($check_720p);
    if ($v_720p && strpos($v_720p[0], '200')) {
      echo '
              <div class="roww">
              <div class="cell" data-title="format">
                720p(.mp4)
              </div>
              <div class="cell" data-title="Action">
               <a href="' . $check_720p . '" ><button class="btn_download">Download</button></a>
              </div>
            </div>';
    }
    $check_480p = 'https://v.redd.it/' . $video_id . '/DASH_480.mp4?source=fallback';
    $v_480p = get_headers($check_480p);
    if ($v_480p && strpos($v_480p[0], '200')) {
      echo '
              <div class="roww">
                <div class="cell" data-title="format">
                  540p(.mp4)
                </div>
                <div class="cell" data-title="Action">
                 <a href="' . $check_480p . '" ><button class="btn_download">Download</button></a>
                </div>
              </div>';
    }
    $check_360p = 'https://v.redd.it/' . $video_id . '/DASH_360.mp4?source=fallback';
    $v_360p = get_headers($check_360p);
    if ($v_360p && strpos($v_360p[0], '200')) {
      echo '
              <div class="roww">
                <div class="cell" data-title="format">
                  360p(.mp4)
                </div>
                <div class="cell" data-title="Action">
                 <a href="' . $check_360p . '" ><button class="btn_download">Download</button></a>
                </div>
              </div>';
    }
    $check_240p = 'https://v.redd.it/' . $video_id . '/DASH_240.mp4?source=fallback';
    $v_240p = get_headers($check_240p);
    if ($v_240p && strpos($v_240p[0], '200')) {
      echo '
              <div class="roww">
                <div class="cell" data-title="format">
                  240p(.mp4)
                </div>
                <div class="cell" data-title="Action">
                 <a href="' . $check_240p . '" ><button class="btn_download">Download</button></a>
                </div>
              </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            <div class="links text-center mt-3">
            <a class="links-m" href="https://redditdownloader.org/">Download more videos</a>
</div>
<div class="promo"><span id="promo">Made with<span class="fa">❤️</span>in <a href="#" target="_blank" >Calgary 🍁</a></span>
</div>';
    }
  }
  if (!empty($image_id)) {
    // echo $image_id;
    $png = 'https://i.redd.it/' . $image_id . '.png';
    $jpg = 'https://i.redd.it/' . $image_id . '.jpg';
    $png_exists = @get_headers($png);
    $jpg_exists = @get_headers($jpg);
    if ($png_exists && strpos($png_exists[0], '200')) {
      echo '<div class="container result">
                <div class="tabs row">
                  <div class="col-xs-12 col-sm-5 col-md-5 "><div class="poster cover"><img class="img-fluid rounded d-block m-auto" src="' . $png . '" style="width:640px;height:700px;"></div>';
    } elseif ($jpg_exists && strpos($jpg_exists[0], '200')) {
      echo '<div class="container result">
                <div class="tabs row">
                  <div class="col-xs-12 col-sm-5 col-md-5 "><div class="poster cover"><img class="img-fluid rounded d-block m-auto" src="' . $jpg . '"style="width:640px;height:700px;"></div>';
    } else {
      echo '<p>Something is not right</p>';
    }

    if (!empty($title)) {
      $title_site = $title[1];
      echo '<div class="caption text-left"><b>' . $title_site . '</b></div></div>
      ';
    }
    echo '<div class="col-xs-12 col-sm-7 col-md-7">
          <div class="container-table100">
            <div class="wrap-table100">
              <div class="table">
                <div class="roww headerr">
                  <div class="cell">File Type</div>
                  <div class="cell">File size</div>
                  <div class="cell">
                    Action
                  </div>
                </div>';
    if ($png_exists && strpos($png_exists[0], '200')) {
      echo '  <div class="roww">
                <div class="cell" data-title="format">
                  PNG
                </div>
                <div class="cell" data-title="Action">
                 <a href="' . $png . '" ><button class="btn_download">Download</button></a>
                </div>
              </div>
              </div>
              </div>
              </div>
              </div>';
    }
    if ($jpg_exists && strpos($jpg_exists[0], '200')) {
      echo '<div class="roww">
                <div class="cell" data-title="format">
                  JPG
                </div>
                <div class="cell" data-title="Action">
                 <a href="' . $jpg . '" ><button class="btn_download">Download</button></a>
                </div>
              </div>
              </div>
            </div>
            </div>
            </div>
            </div>
            <div class="links text-center mt-3">
            <a class="links-m" href="https://redditdownloader.org/">Download more videos</a>
</div>
<div class="promo"><span id="promo">Made with<span class="fa">❤️</span>in <a href="#" target="_blank" >Calgary 🍁</a></span>
</div>
            
            ';
    }
  }
  if (!empty($gif_id)) {
    $gif = 'https://i.redd.it/' . $gif_id . '.gif';
    echo '<div class="container result">
    <div class="tabs row">
      <div class="col-xs-12 col-sm-5 col-md-5 "><div class="poster cover"><img class="img-fluid rounded d-block m-auto" src="' . $gif . '"></img></div>';

    if (!empty($title)) {
      $title_site = $title[1];
      echo '<div class="caption text-left"><b>' . $title_site . '</b></div></div>';
    }


    $gif_exists = @get_headers($gif);
    echo '<div class="col-xs-12 col-sm-7 col-md-7">
  <div class="container-table100">
    <div class="wrap-table100">
      <div class="table">
        <div class="roww headerr">
          <div class="cell">File Type</div>
          <div class="cell">File size</div>
          <div class="cell">
            Action
          </div>
        </div>';
    if ($gif_exists && strpos($gif_exists[0], '200')) {
      echo '  <div class="roww">
        <div class="cell" data-title="format">
          GIF
        </div>
        <div class="cell" data-title="Action">
         <a href="' . $gif . '" ><button class="btn_download">Download</button></a>
        </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      <div class="links text-center mt-3">
      <a class="links-m" href="https://redditdownloader.org/">Download more videos</a>
</div>
<div class="promo"><span id="promo">Made with<span class="fa">❤️</span>in <a href="#" target="_blank" >Calgary 🍁</a></span>
</div>';
    }
  }
  ?>