<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<body>
<?php require_once "Bar.php" ?>
<div class="main-content">
  <div class="page-content">
    <div class="container-fuild">
      <div class="wrapper ">
        <div class="card fback">
          <div class="card-header card-header-primary" style="background: #8b57c6 !important; display: flex; flex-direction: column; align-items: center;">
            <h6 class="titleeprof">NOTIFICATION SETTINGS</h6>
            <p class="minutitle">We may still send you important notifications about your account outside of your notification settings.</p>
          </div>
          <div class="card-body">
            <form  method="post" action="<?php echo base_url('Settings/insert'); ?>">
              <div class="fback">
                <ul class="list-group list-group-sm">
                  <li class="list-group-item backk"> Notify me by email for latest news
                    <div class="form-check form-switch form-switch-md mb-3">
                      <input type="checkbox" name="my_checkbox1" class="form-check-input" id="my_checkbox1" value="on" <?php echo $checked; ?>>
                    </div>
                  </li>
                  <li class="list-group-item backk"> Notify me about new features and updates
                    <div class="form-check form-switch form-switch-md mb-3">
                      <input type="checkbox" name="my_checkbox2" class="form-check-input" id="my_checkbox2" value="on" <?php echo $my_checkbox2; ?>>
                    </div>
                  </li>
                  <li class="list-group-item backk"> Notify me about new Events and  promotions
                    <div class="form-check form-switch form-switch-md mb-3">
                      <input type="checkbox" name="my_checkbox3" class="form-check-input" id="my_checkbox3" value="on" <?php echo $my_checkbox3; ?> >
                    </div>
                  </li>

                </ul>
                <div  style="display: flex !important; justify-content: center !important;">
                  <button type="submit" id="editform" class="btn updateprofi col-sm-8">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
