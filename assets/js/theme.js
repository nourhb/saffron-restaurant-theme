/**
 * Saffron theme interactions: scroll reveals, back-to-top button.
 * Vanilla JS, no dependencies. Honors prefers-reduced-motion.
 */
(function () {
	'use strict';

	var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

	// Scroll reveal.
	var revealEls = document.querySelectorAll('.saffron-reveal');

	if (revealEls.length && !reduceMotion && 'IntersectionObserver' in window) {
		var observer = new IntersectionObserver(function (entries) {
			entries.forEach(function (entry) {
				if (entry.isIntersecting) {
					entry.target.classList.add('is-visible');
					observer.unobserve(entry.target);
				}
			});
		}, { threshold: 0.12 });

		revealEls.forEach(function (el) {
			observer.observe(el);
		});
	} else {
		revealEls.forEach(function (el) {
			el.classList.add('is-visible');
		});
	}

	// Back to top button.
	var backTop = document.createElement('button');
	backTop.className = 'saffron-back-top';
	backTop.setAttribute('aria-label', 'Back to top');
	backTop.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M12 19V5M5 12l7-7 7 7"/></svg>';
	document.body.appendChild(backTop);

	function toggleBackTop() {
		if (window.scrollY > 600) {
			backTop.classList.add('is-visible');
		} else {
			backTop.classList.remove('is-visible');
		}
	}

	window.addEventListener('scroll', toggleBackTop, { passive: true });
	toggleBackTop();

	backTop.addEventListener('click', function () {
		window.scrollTo({ top: 0, behavior: reduceMotion ? 'auto' : 'smooth' });
	});
})();
