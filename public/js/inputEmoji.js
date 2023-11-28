(function ($) {
	$.fn.emoji = function (params) {
		var defaults = {
			button: '&#x1F642;',
			place: 'before',
			emojis: [
				'&#x1F642;', '&#x1F641;', '&#x1F600;', '&#x1F601;', '&#x1F602;', '&#x1F603;', '&#x1F604;', '&#x1F605;', '&#x1F606;',
				'&#x1F607;', '&#x1F608;', '&#x1F609;', '&#x1F60A;', '&#x1F60B;', '&#x1F60C;', '&#x1F60D;', '&#x1F60E;', '&#x1F60F;',
				'&#x1F610;', '&#x1F611;', '&#x1F612;', '&#x1F613;', '&#x1F614;', '&#x1F615;', '&#x1F616;', '&#x1F617;', '&#x1F618;',
				'&#x1F619;', '&#x1F61A;', '&#x1F61B;', '&#x1F61C;', '&#x1F61D;', '&#x1F61E;', '&#x1F61F;', '&#x1F620;', '&#x1F621;',
				'&#x1F622;', '&#x1F623;', '&#x1F624;', '&#x1F625;', '&#x1F626;', '&#x1F627;', '&#x1F628;', '&#x1F629;', '&#x1F62A;',
				'&#x1F62B;', '&#x1F62C;', '&#x1F62D;', '&#x1F62E;', '&#x1F62F;', '&#x1F630;', '&#x1F631;', '&#x1F632;', '&#x1F633;',
				'&#x1F634;', '&#x1F635;', '&#x1F636;', '&#x1F637;', '&#x1F638;', '&#x1F639;', '&#x1F63A;', '&#x1F63B;', '&#x1F63C;',
				'&#x1F63D;', '&#x1F63E;', '&#x1F63F;', '&#x1F640;', '&#x1F643;', '&#x1F4A9;', '&#x1F644;', '&#x2620;', '&#x1F44C;',
				'&#x1F44D;', '&#x1F44E;', '&#x1F648;', '&#x1F649;', '&#x1F64A;', '&#x1F64B;', '&#x1F64C;', '&#x1F64D;', '&#x1F64E;',
				'&#x1F64F;', '&#x1F9D0;', '&#x1F9D1;', '&#x1F9D2;', '&#x1F9D3;', '&#x1F9D4;', '&#x1F9D5;', '&#x1F9D6;', '&#x1F9D7;',
				'&#x1F9D8;', '&#x1F9D9;', '&#x1F9DA;', '&#x1F9DB;', '&#x1F9DC;', '&#x1F9DD;', '&#x1F9DE;', '&#x1F9DF;', '&#x1F9E0;',
				'&#x1F9E1;', '&#x1F9E2;', '&#x1F9E3;', '&#x1F9E4;', '&#x1F9E5;', '&#x1F9E6;', '&#x1F9E7;', '&#x1F9E8;', '&#x1F9E9;',
				'&#x1F9EA;', '&#x1F9EB;', '&#x1F9EC;', '&#x1F9ED;', '&#x1F9EE;', '&#x1F9EF;', '&#x1F9F0;', '&#x1F9F1;', '&#x1F9F2;',
				'&#x1F9F3;', '&#x1F9F4;', '&#x1F9F5;', '&#x1F9F6;', '&#x1F9F7;', '&#x1F9F8;', '&#x1F9F9;', '&#x1F9FA;', '&#x1F9FB;',
				'&#x1F9FC;', '&#x1F9FD;', '&#x1F9FE;', '&#x1F9FF;'
			  ],
						  fontSize: '20px',
			listCSS: {position: 'relative', border: '1px solid gray', 'background-color': '#fff', display: 'none'},
			rowSize: 50,
		};
		var settings = {};
		if (!params) {
			settings = defaults;
		} else {
			for (var n in defaults) {
				settings[n] = params[n] ? params[n] : defaults[n];
			}
		}

		this.each(function (n, input) {
			var $input = $(input);

			function showEmoji() {
				$list.show();
				$input.focus();
				setTimeout(function () {
					$(document).on('click', closeEmoji);
				}, 1);
			}

			function closeEmoji() {
				$list.hide();
				$(document).off('click', closeEmoji);
			}

			function clickEmoji(ev) {
				if (input.selectionStart || input.selectionStart == '0') {
					var startPos = input.selectionStart;
					var endPos = input.selectionEnd;
					input.value = input.value.substring(0, startPos)
						+ ev.currentTarget.innerHTML
						+ input.value.substring(endPos, input.value.length);
				} else {
					input.value += ev.currentTarget.innerHTML;
				}

				closeEmoji();
				$input.focus();
				input.selectionStart = startPos + 2;
				input.selectionEnd = endPos + 2;
			}

			var $button = $("<span>").html(settings.button).css({cursor: 'pointer', 'font-size': settings.fontSize}).on('click', showEmoji);
			var $list = $('<div>').css(defaults.listCSS).css(settings.listCSS);
			for (var n in settings.emojis) {
				if (n > 0 && n % settings.rowSize == 0) {
					$("<br>").appendTo($list);
				}
				$("<span>").html(settings.emojis[n]).css({cursor: 'pointer', 'font-size': settings.fontSize}).on('click', clickEmoji).appendTo($list);
			}

			if (settings.place === 'before') {
				$button.insertBefore(this);
			} else {
				$button.insertAfter(this);
			}
			$list.insertAfter($input);
		});
		return this;
	};
}
)(jQuery);
