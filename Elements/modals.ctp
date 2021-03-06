<!-- Modal (connexion ...) -->
<div class="modal modal-medium fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="card-header">
				<button type="button" class="close" data-dismiss="modal"><i style="color:white" class="fa fa-window-minimize "></i><span
						class="sr-only"><?= $Lang->get('GLOBAL__CLOSE') ?></span></button>
				<h4 class="modal-title" id="myModalLabel"><?= $Lang->get('USER__LOGIN') ?></h4>
			</div>
			<div class="card-body">
				<form class="form-horizontal" method="POST" data-ajax="true"
					  action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_login')) ?>"
					  data-redirect-url="?">

					<div class="form-group">
						<h6><?= $Lang->get('USER__USERNAME') ?></h6>
						<input type="text" class="form-control" name="pseudo" id="inputEmail3"
							   placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>">
					</div>

					<div class="form-group">
						<h6><?= $Lang->get('USER__PASSWORD') ?></h6>
						<div class="row" style="margin-left: 1px;margin-right: -1px;">
							<input type="password" class="form-control w-75" name="password"
									   placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>">
							<button class="unmask btn btn-secondary w-25" type="button" title="Afficher le mot de passe">Afficher</button>
						</div>
<script type="text/javascript">
function changeType(x, type) {
   if(x.prop('type') == type)
      return x;
   try {
      return x.prop('type', type);
   } 
   catch(e) {
      var html = $("<div>").append(x.clone()).html();
      var regex = /type=(\")?([^\"\s]+)(\")?/;
      var tmp = $(html.match(regex) == null ?
         html.replace(">", ' type="' + type + '">') :
         html.replace(regex, 'type="' + type + '"') );

      tmp.data('type', x.data('type') );
      var events = x.data('events');
      var cb = function(events) {
         return function() {
            for(i in events) {
               var y = events[i];
               for(j in y) tmp.bind(i, y[j].handler);
            }
         }
      }(events);
      x.replaceWith(tmp);
      setTimeout(cb, 10);
      return tmp;
   }
}
$('.unmask').on('click', function(){
  
  if($(this).prev('input').attr('type') == 'password')
    changeType($(this).prev('input'), 'text');
  
  else
    changeType($(this).prev('input'), 'password');
  
  return false;
});
</script>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember_me">
										<?= $Lang->get('USER__REMEMBER_ME') ?>
									</label>
								</div>
							</div>
						</div>
					</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-lg-6">
						<div class="text-center"><h6><a  style="color:white" data-dismiss="modal" href="#" data-toggle="modal" data-target="#lostpasswd"><?= $Lang->get('USER__PASSWORD_FORGOT_LABEL') ?></a></h6></div>
					</div>
					<div class="col-lg-6">
						<button type="submit" class="btn btn-secondary button"><?= $Lang->get('USER__LOGIN') ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal modal-medium fade" id="lostpasswd" tabindex="-1" role="dialog" aria-labelledby="lostpasswdLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card-header">
        <button type="button" class="close" data-dismiss="modal"><i style="color:white" class="fa fa-window-minimize"></i></button>
        <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('USER__PASSWORD_FORGOT_LABEL') ?></h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_lostpasswd')) ?>">
          <div class="form-group">
			  <h6><?= $Lang->get('USER__EMAIL') ?> </h6>
              <input type="text" class="form-control" name="email" placeholder="<?= $Lang->get('USER__EMAIL_LABEL') ?>">
          </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-secondary button"><?= $Lang->get('USER__PASSWORD_FORGOT_SEND_MAIL') ?></button>
      </form>
      </div>
    </div>
  </div>
</div>

<?php if(!empty($resetpsswd)) { ?>
  <div class="modal modal-medium fade" id="lostpasswd2" tabindex="-1" role="dialog" aria-labelledby="lostpasswd2Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="card-header">
          <button type="button" class="close" data-dismiss="modal"><i style="color:white" class="fa fa-window-minimize "></i></button>
          <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('USER__PASSWORD_FORGOT_LABEL') ?></h4>
        </div>
        <div class="card-body">
          <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_resetpasswd')) ?>" data-redirect-url="?">
            <input type="hidden" name="key" value="<?= $resetpsswd['key'] ?>">
            <input type="hidden" name="email" value="<?= $resetpsswd['email'] ?>">
            <div class="form-group">
				<h6><?= $Lang->get('USER__PASSWORD') ?></h6>
                <input type="password" class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>">
            </div>
            <div class="form-group">
				<h6><?= $Lang->get('USER__PASSWORD_CONFIRM') ?></h6>
                <input type="password" class="form-control" name="password2" placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM_LABEL') ?>">
            </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-secondary button"><?= $Lang->get('GLOBAL__SAVE') ?></button>
        </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="card-header">
        <button type="button" class="close" data-dismiss="modal"><i style="color:white" class="fa fa-window-minimize "></i></button>
        <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('USER__REGISTER') ?></h4>
      </div>
      <div class="card-body">
        <form class="form-horizontal" method="POST" data-ajax="true" action="<?= $this->Html->url(array('plugin' => null, 'admin' => false, 'controller' => 'user', 'action' => 'ajax_register')) ?>" data-redirect-url="?">
          <div class="form-group">
		      <h6><?= $Lang->get('USER__USERNAME') ?></h6>
              <input type="text" class="form-control" name="pseudo" placeholder="<?= $Lang->get('USER__USERNAME_LABEL') ?>">
          </div>
          <div class="form-group">
			  <h6><?= $Lang->get('USER__PASSWORD') ?></h6>
              <input type="password" class="form-control" name="password" placeholder="<?= $Lang->get('USER__PASSWORD_LABEL') ?>">
          </div>
          <div class="form-group">
			  <h6><?= $Lang->get('USER__PASSWORD_CONFIRM') ?></h6>
              <input type="password" class="form-control" name="password_confirmation" placeholder="<?= $Lang->get('USER__PASSWORD_CONFIRM_LABEL') ?>">
          </div>
          <div class="form-group">
			  <h6><?= $Lang->get('USER__EMAIL') ?> </h6>
              <input type="email" class="form-control" name="email" placeholder="<?= $Lang->get('USER__EMAIL_LABEL') ?>">
          </div>
          
          <?php if($reCaptcha['type'] == "google") { ?>
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <div class="form-group">
				<h6><?= $Lang->get('FORM__CAPTCHA') ?></h6>
                <div class="g-recaptcha" data-sitekey="<?= $reCaptcha['siteKey'] ?>"></div>
            </div>
          <?php } else { ?>
          
            <div class="form-group">
				<h6><?= $Lang->get('FORM__CAPTCHA') ?></h6>
                <?php
                  echo $this->Html->image(array('controller' => 'user', 'action' => 'get_captcha', 'plugin' => false, 'admin' => false), array('plugin' => false, 'admin' => false, 'id' => 'captcha_image'));
                  echo $this->Html->link($Lang->get('FORM__RELOAD_CAPTCHA'), 'javascript:void(0);',array('id' => 'reload'));
                ?>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="captcha" id="inputPassword3" placeholder="<?= $Lang->get('FORM__CAPTCHA_LABEL') ?>">
            </div>
          <?php } ?>
		  <?php if (!empty($condition)) { ?>
		  <div class="form-group">
			<div class="checkbox">
				<label>
					<input type="checkbox" name="condition">
					<?=$Lang->get('USER__CONDITION_1')?> <a href="<?= $condition ?>"> <?= $Lang->get('USER__CONDITION_2')?></a>
				</label>
			</div>
		  </div>
		 <?php } ?>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-secondary button"><?= $Lang->get('USER__REGISTER') ?></button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    <?php if(!empty($resetpsswd)) { ?>
      $('#lostpasswd2').modal('show');
    <?php } ?>
  });
</script>

<?php if(isset($isConnected) && $isConnected) { ?>
  <div class="modal modal-medium fade" id="notifications_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="card-header">
          <button type="button" class="close" data-dismiss="modal"><i style="color:white" class="fa fa-window-minimize "></i></button>
          <h4 class="modal-title"><?= $Lang->get('NOTIFICATIONS__LIST') ?></h4>
        </div>
        <div class="card-body" style="padding:0;">

          <div class="notifications-list"></div>

        </div>
        <div class="card-footer">
          <button type="button" class="btn btn-default btn-block" onclick="notification.markAllAsSeen()" data-dismiss="modal"><?= $Lang->get('NOTIFICATIONS__MARK_ALL_AS_SEEN') ?></button>
          <button type="submit" class="btn btn-danger btn-block" onclick="notification.clearAll()" data-dismiss="modal"><?= $Lang->get('NOTIFICATIONS__CLEAR_ALL') ?></button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
