<div id="categoryDiv" class="main-card uk-card uk-card-default uk-card-body uk-width-1-2@m" style="display:none;" uk-scrollspy="cls:uk-animation-slide-right">
  
        <?php include 'form-sections/dotnav.php'; ?>
      
        <h3 class="uk-card-title uk-text-center"><small>Let's Get Started...</small><br><br>What Kind of Device Is It?</h3>
      
        <div class="uk-margin uk-text-center">
            <div uk-form-custom="target: > * > span:first-child">
                <select id="device_category" name="device_category" onchange="get_manufacturers(this.value);nav_next();">
                    <option value="">Please select device type</option>
              <?php
                $q = "SELECT DISTINCT `device_category` FROM `apple_device_values` WHERE `inactive` != 'Yes'";
                $g = mysqli_query($conn, $q) or die($conn->error);
                while($r = mysqli_fetch_array($g)){
                  echo '<option value="' . $r['device_category'] . '">' . $r['device_category'] . '</option>';
                }
              ?>
                </select>
                <button class="uk-button uk-button-default" type="button" tabindex="-1">
                    <span></span>
                    <span uk-icon="icon: chevron-down"></span>
                </button>
            </div>
        </div>

  <?php include 'form-sections/help-footer.php'; ?>
      
    </div>