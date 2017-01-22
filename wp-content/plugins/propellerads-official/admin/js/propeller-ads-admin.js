(function ($) {
	'use strict';

	$(window).load(function () {
		setFieldsLock(getSettingsField('onclick', 'enabled'), [
			getSettingsField('onclick', 'zone_id'),
			getSettingsField('onclick', 'anti_adblock_enabled')
		]);

		setFieldsLock(getSettingsField('onclick', 'anti_adblock_enabled'), [
			getSettingsField('onclick', 'anti_adblock_token'),
			getSettingsField('onclick', 'anti_adblock_zone_id')
		], {hide: true});

		getSettingsField('onclick', 'anti_adblock_enabled').on('change', function () {
			var checked = getSettingsField('onclick', 'anti_adblock_enabled').prop('checked');
			getSettingsField('onclick', 'zone_id').parents('tr').first().toggle(!checked);
		});
		getSettingsField('onclick', 'anti_adblock_enabled').change();

		setFieldsLock(getSettingsField('interstitial', 'enabled'), [
			getSettingsField('interstitial', 'zone_id')
		]);

		setFieldsLock(getSettingsField('pushup', 'enabled'), [
			getSettingsField('pushup', 'zone_id')
		]);
	});

	/**
	 * Disable/enable fields editing depending on checkbox state
	 *
	 * @param $checkbox    Activation checkbox
	 * @param $inputs    List of fields that should be locked when checkbox unchecked
	 * @param options   Options: hide – hide/show row with locked input
	 */
	function setFieldsLock($checkbox, $inputs, options) {
		var opts = options || {hide: false};

		var updateLock = function () {
			var isLocked = !$checkbox.prop('checked');
			$inputs.forEach(function ($input) {
				if ($input.is(':checkbox')) {
					if (isLocked) {
						$input.prop('checked', false);
						$input.change();
					}
					$input.prop('disabled', isLocked);
				} else {
					$input.prop('readonly', isLocked);
				}

				if (opts.hide) {
					var $container = $input.parents('tr').first();
					$container.toggle(!isLocked);
				}
			});
		};

		updateLock();
		$checkbox.on('change', updateLock);
	}

	/**
	 * Get jQuery wrapper of settings input
	 *
	 * @param sectionId
	 * @param fieldId
	 * @returns {*|HTMLElement}
	 */
	function getSettingsField(sectionId, fieldId) {
		return $('#propeller_ads_' + sectionId + '_' + fieldId);
	}

})(jQuery);
