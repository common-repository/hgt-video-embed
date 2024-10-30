jQuery(function(){
	var videoSourceNameSection 	= jQuery('.single-video-source__name-section'),
		videoSourceUrlSection  	= jQuery('.single-video-source__url-section'),
		steps 					= jQuery('.steps'),
		button 					= jQuery('.toggle-button'),
		videoSourceSaveButton	= jQuery('.generic-save-button'),
		selectedVideoSource 	= jQuery('.selected-video-source-icon'),
		mainTitle 				= jQuery('.main-screen__plugin-body-title'),
		svs 					= jQuery('.svs'),
		allSectionsSaveButton 	= jQuery('.save-button'),
		videoUrlField 			= jQuery('.single-video-source__url-section--video-url-field'),
		sidebarContainer 		= jQuery('sidebar-preview'),
		sidebarVideoContainer 	= jQuery('.sidebar-preview__video-container'),
		sidebarHeadingContainer = jQuery('.sidebar-preview__heading-container'),
		sidebarParaContainer 	= jQuery('.sidebar-preview__paragraph-container'),
		sidebarButttonContainer = jQuery('.sidebar-preview__button-container'),
		arrowContainer 			= jQuery('.sidebar-preview__arrow-container');


	
	steps.not(":eq(0)").next().slideUp();

/*
SELECT VIDEO SOURCE SECTION
*/
	videoSourceSaveButton.on('click', function(){
		$this = jQuery(this);

		var className = $this.parent().attr('class').split(' '),
			checkBoxIconContainer = jQuery('.checkbox-icon');

		checkBoxIconContainer.empty();

		checkBoxIconContainer.append('<i class="fa fa-check-square" aria-hidden="true"></i>');

		selectedVideoSource.empty();

		if ( className[1] == 'youtube-save-btn') {

			svs.css({
				'width': '332px'
			});

			selectedVideoSource.append('<i class="fa fa-youtube-play" aria-hidden="true"> YouTube </i>');

			selectedVideoSource.css({
				'display':'inline-block',
				'margin-left' : '-4px',
				'color' : '#b31217',
				'background-color' : '#fff',
				'font-size' : '16px',
				'padding' : '16px 16px 10px'
			});

			selectedVideoSource.next().hide();

			var currentUrlField = jQuery(this).parent().prev();

			videoUrlField.not(currentUrlField).val("");

			var urlValue = jQuery(this).parent().prev().val();

			videoId = urlValue.split('v=')[1];

			sidebarVideoContainer.empty();

			sidebarVideoContainer.append(
				'<iframe src="https://www.youtube.com/embed/'+videoId+'" frameborder="0" allowfullscreen></iframe>'
			);

		} else if ( className[1] == 'vimeo-save-btn') {

			svs.css({
				'width': '332px'
			});

			selectedVideoSource.append('<i class="fa fa-vimeo-square" aria-hidden="true">Vimeo</i>');

			selectedVideoSource.css({
				'display':'inline-block',
				'margin-left' : '-4px',
				'color': '#1AACE5',
				'background-color' : '#fff',
				'font-size' : '16px',
				'padding' : '16px 27px 10px'
			});

			selectedVideoSource.next().hide();

			var currentUrlField = jQuery(this).parent().prev();

			videoUrlField.not(currentUrlField).val("");

			var urlValue = jQuery(this).parent().prev().val();

			videoIdArray = urlValue.split('/');

			videoId = videoIdArray[videoIdArray.length - 1];

			sidebarVideoContainer.empty();

			sidebarVideoContainer.append(
				'<iframe src="https://player.vimeo.com/video/'+videoId+'?portrait=0&badge=0"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
			);



		} else if ( className[1] == 'wistia-save-btn') {

			svs.css({
				'width': '332px'
			});

			selectedVideoSource.append('<img src="'+wve_templateUrl+'wistia_logo.png" alt="wistia logo" wistia-logo">Wistia');

			selectedVideoSource.css({
				'display':'inline-block',
				'margin-left' : '-4px',
				'color' : '#168BDA',
				'background-color' : '#fff',
				'font-size' : '16px',
				'padding' : '16px 23.5px 10px'
			});

			selectedVideoSource.next().hide();

			var currentUrlField = jQuery(this).parent().prev();

			videoUrlField.not(currentUrlField).val("");

			var urlValue = jQuery(this).parent().prev().val();

			videoIdArray = urlValue.split('/');

			videoId = videoIdArray[videoIdArray.length - 1];

			sidebarVideoContainer.empty();

			sidebarVideoContainer.append(
				'<iframe src="//fast.wistia.net/embed/iframe/'+videoId+'" allowtransparency="true" frameborder="0" scrolling="no" class="wistia_embed" name="wistia_embed" allowfullscreen mozallowfullscreen webkitallowfullscreen oallowfullscreen msallowfullscreen></iframe>'
			);

		} else if ( className[1] == 'ml-save-btn') {

			svs.css({
				'width': '332px'
			});

			selectedVideoSource.append('<i class="fa fa-upload source-icon" aria-hidden="true">Media</i>');

			selectedVideoSource.css({
				'display':'inline-block',
				'margin-left' : '-4px',
				'color' : '#484C4D',
				'background-color' : '#fff',
				'font-size' : '16px',
				'padding' : '16px 28px 10px'
			});

			selectedVideoSource.next().hide();

			var urlValue = jQuery(this).parent().prev().val();

			sidebarVideoContainer.empty();

			sidebarVideoContainer.append(
				'<video controls> <source src="'+urlValue+'">Your browser does not support the video tag.</video>'
			);


		} else if ( className[1] == 'link-save-btn') {

			svs.css({
				'width': '332px'
			});

			selectedVideoSource.append('<i class="fa fa-external-link-square source-icon" aria-hidden="true">Link</i>');

			selectedVideoSource.css({
				'display':'inline-block',
				'margin-left' : '-4px',
				'color' : '#484C4D',
				'background-color' : '#fff',
				'font-size' : '16px',
				'padding' : '16px 33.5px 10px'
			});

			selectedVideoSource.next().hide();

			var urlValue = jQuery(this).parent().prev().val();

			sidebarVideoContainer.empty();

			sidebarVideoContainer.append(
				'<video controls> <source src="'+urlValue+'">Your browser does not support the video tag.</video>'
			);

		}

		var parentStep = $this.parents().find('.steps').eq(0);

		parentStep.next().slideUp();

		parentStep.siblings('.steps').eq(0).slideDown();

		parentStep.siblings('.steps').eq(0).next().slideDown();

	});

	
	videoSourceNameSection.on('click', function(){

		$this = jQuery(this);

		jQuery('.single-video-source').not($this).removeClass('change-background');

		$this.parent().addClass('change-background');
		
		$this.next().slideToggle(200);

		jQuery('.video-sources').find(videoSourceUrlSection).not($this.next()).slideUp(200);

	});


	steps.on('click', function(){

		$this = jQuery(this);

		$this.next().slideToggle();

	});


/*
CUSTOM BUTTON STYLING
*/
	button.on('click', function(e){
		
		e.preventDefault();

		$this = jQuery(this);

		$this.css({
			'background-color' : '#77b315',
			'padding' : '3px 25px'
		});

		$this.addClass('active');

		$this.siblings(".toggle-button").css({
			'background-color' : '#939393',
			'padding' : '3px 15px'
		});

		if ($this.siblings(".toggle-button").hasClass('active')) {

			$this.siblings(".toggle-button").removeClass('active');

		}

		
	});

	allSectionsSaveButton.on('click', function(e){

		$this = jQuery(this);

		var enableStatus = $this.prev().find('.active').text(),
			enableStatusEl = $this.parent().parent().prev('.steps').find('.enable-status'),
			checkBoxIconContainer = $this.parent().parent().prev('.steps').find('.checkbox-icon-2'),
			parentHeading = $this.parent().parent().prev('.steps').find('.parent-heading');

		var headlineTextValue = jQuery('.headline-text').val();
			paraText = jQuery('.para-text').val();
			btnText = jQuery('.btn-text').val();
			btnLink = jQuery('aff-link').val();

		sidebarHeadingContainer.empty();
		sidebarHeadingContainer.append(
			'<h3>'+headlineTextValue+'</h3>'
		);

		sidebarParaContainer.empty();
		sidebarParaContainer.append(
			'<p>'+paraText+'</p>'
		);


		if ( $this.parent().hasClass('affliate-link-body')) {

			sidebarButttonContainer.empty();
			sidebarButttonContainer.append(
				'<a href="'+btnLink+'"'+
				'<button class="previewButton">'+btnText+'</button>'+
				'</a>'
			);
			sidebarButttonContainer.css('display', 'inline-block');

			arrowContainer.empty();
			arrowContainer.append(
				'<i class="fa fa-arrow-right" aria-hidden="true"></i>'
			);
			arrowContainer.css('display', 'inline-block');
		}




		checkBoxIconContainer.empty();

		checkBoxIconContainer.append('<i class="fa fa-check-square" aria-hidden="true"></i>');

		if (enableStatus == 'ON') {

			enableStatusEl.empty();

			enableStatusEl.append('<h4>Enabled</h4>');

			parentHeading.css({
				'width' : '333px'
			});

			enableStatusEl.css({
				'display' : 'inline-block',
				'color' : '#7DBA00',
				'background-color' : '#fff',
				'margin-left' : '-4px',
				'padding' : '6px 22px 0'
			});

			enableStatusEl.next().hide();

		} else if ( enableStatus == 'OFF') {

			enableStatusEl.empty();

			enableStatusEl.append('<h4>Disabled</h4>');

			parentHeading.css({
				'width' : '332px'
			});

			enableStatusEl.css({
				'display' : 'inline-block',
				'color' : '#7DBA00',
				'background-color' : '#fff',
				'margin-left' : '-4px',
				'padding' : '6px 21px 0'
			});

			enableStatusEl.next().hide();
		}

		$this.parent().parent().slideUp();

		$this.parent().parent().next().next().slideDown();

		e.preventDefault();

	});

	jQuery('.final-step').on('click', function(e){

		$this = jQuery(this);

		enableStatusEl = $this.closest('section').prev().find('.enable-status');

		parentHeading = $this.closest('section').prev().find('.parent-heading');

		enableStatusEl.empty();

		enableStatusEl.append('<h4> Configured </h4>');

		parentHeading.css({
			'width' : '332px'
		});

		enableStatusEl.css({
			'display' : 'inline-block',
			'color' : '#7DBA00',
			'background-color' : '#fff',
			'margin-left' : '-4px',
			'padding' : '6px 12px 0'
		});

		enableStatusEl.next().hide();

		jQuery('.short-code-body__configuations').css('display','block');

		e.preventDefault();
	})

	jQuery('.more-info').on('click', function(e){

		$this = jQuery(this);

		jQuery('.more-info-para').slideToggle();

		if ( $this.next().hasClass('down-arrow')) {

			return;

			event.stopPropagation();

		} else {

			$this.after ('<i class="fa fa-arrow-down down-arrow" aria-hidden="true"></i>');

		}		
		e.preventDefault();
	})

	jQuery('.marketing-video-save-button').on('click', function(e){

		$this = jQuery(this);

		loaderIconContainer = $this.next();

		loaderIconContainer.empty();

		loaderIconContainer.append('<img src="'+wve_templateUrl+'/loading.gif" class="loader" alt="loading">').delay(800).queue(function(next){
			
			loaderIconContainer.empty();
			
			$this.prev().empty();

			$this.prev().append('<i class="fa fa-check-square" aria-hidden="true"></i>');

			jQuery('.short-code-body__generated-short-code').slideDown();

			next();
		});

		e.preventDefault();
	});

	jQuery('.copy-code').on('click', function(e){

		$this = jQuery(this);
		
		$this.prev().empty();

		$this.prev().append('<i class="fa fa-check-square" aria-hidden="true"></i>');

	});


	jQuery('.wve-pin-screen').on('click', function(){

		$this = jQuery(this);

		if ( $this.text() == 'ON' ) {

			var parentClass = $this.parent().next().next();

			parentClass.removeClass('disable-button-group');

			parentClass.addClass('enable-button-group');

			parentClass.children().removeClass('disable-toggle-button');

			parentClass.children().addClass('enable-toggle-button');

			jQuery('.enable-toggle-button').on('click', function(){

				$this = jQuery(this);

				if ( ($this.text() == 'LEFT') && ($this.hasClass('enable-toggle-button'))) {

					$this.css({
						'background-color' 	: '#77B315',
						'padding'			: '3px 10px 3px 20px'
					});

					$this.siblings().css({
						'background-color' 	: '#939393',
						'padding'			: '3px 10px'
					});

				} else if ( ($this.text() == 'RIGHT') && ($this.hasClass('enable-toggle-button')) ) {

					$this.css({
						'background-color'	: '#77B315',
						'padding'			: '3px 10px 3px 20px'
					})
					$this.siblings().css({
						'background-color' 	: '#939393',
						'padding'			: '3px 10px'
					});
				}	
			});
		} else if ( $this.text() == 'OFF' ) {

			var parentClass = $this.parent().next().next();

			if ( parentClass.hasClass ('enable-button-group') ) {

				parentClass.removeClass('enable-button-group');

				parentClass.addClass('disable-button-group');

				parentClass.children().removeClass('enable-toggle-button');

				parentClass.children().addClass('disable-toggle-button');

				jQuery('.disable-toggle-button').css({
					'background-color' : '#DCDCDC'
				})
			}
		}
	});


});//ENDING DOCUMENT.READY
function wve_upgrade_pro(){
	alert('Upgrade to Pro Version!');
}