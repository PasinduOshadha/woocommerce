<?php
declare(strict_types=1);
namespace Automattic\WooCommerce\Admin\Features\OnboardingTasks\Tasks;

use Automattic\WooCommerce\Internal\Admin\Onboarding\OnboardingProfile;
use Automattic\WooCommerce\Admin\Features\OnboardingTasks\Task;

/**
 * Core Profiler Task
 */
class CoreProfiler extends Task {
	/**
	 * ID.
	 *
	 * @return string
	 */
	public function get_id() {
		return 'core_profiler';
	}

	/**
	 * Title.
	 *
	 * @return string
	 */
	public function get_title() {
		if ( $this->is_complete() ) {
			return __( 'You completed the store setup', 'woocommerce' );
		}
		return __( 'Store setup', 'woocommerce' );
	}

	/**
	 * Content.
	 *
	 * @return string
	 */
	public function get_content() {
		return __(
			'Share a few details about your store to help us provide the best setup experience for you.',
			'woocommerce'
		);
	}

	/**
	 * Time.
	 *
	 * @return string
	 */
	public function get_time() {
		return __( '2 minutes', 'woocommerce' );
	}

	/**
	 * Action URL.
	 *
	 * @return string
	 */
	public function get_action_url() {
		return admin_url( 'admin.php?page=wc-admin&path=%2Fsetup-wizard' );
	}

	/**
	 * Task completion.
	 *
	 * @return bool
	 */
	public function is_complete() {
		return ! OnboardingProfile::needs_completion();
	}

	/**
	 * Task visibility.
	 *
	 * @return bool
	 */
	public function can_view() {
		return class_exists( 'Automattic\WooCommerce\Internal\Admin\Onboarding\OnboardingProfile' );
	}
}
