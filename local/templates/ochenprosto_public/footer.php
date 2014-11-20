	</div>
	<div class="col-md-3 side-bar__right">
	<?if(!$APPLICATION->GetDirProperty("hide_enter") && $APPLICATION->GetCurDir()!='/'):?>
		<div class="landing">
			<div class="enter2 index" data-spy="affix" data-offset-top="60" data-offset-bottom="150">
				<div class="title">
					<span>Вход</span>
					<span>для специалистов </span>
					<span>здравоохранения</span>
				</div>

				<div class="b-frame" css="" style="opacity: 1;">
					<div class="checkbox"></div>
					<a href="/doctors/" class="no-ajax">Войти</a>
				</div>

				<p>Вход для специалистов здравоохранения. Вся информация, размещенная в данном разделе веб-сайта, предназначена исключительно для специалистов здравоохранения – медицинских 
				и фармацевтических работников. </p>

				<p>Если Вы не являетесь специалистом здравоохранения, в соответствии 
				с положениями действующего законодательства РФ Вы не имеете права доступа к информации, размещенной в данном разделе веб-сайта, в связи с чем просим Вас незамедлительно покинуть данный раздел веб-сайта.</p>
				<p>Если Вы являетесь специалистом здравоохранения, в качестве подтверждения нажмите «ВОЙТИ», чтобы начать работу.</p>
			</div>
		</div>
	<?endif;?>
	</div>
</div>

<? require_once($_SERVER['DOCUMENT_ROOT'].'/include/footer.php') ?>