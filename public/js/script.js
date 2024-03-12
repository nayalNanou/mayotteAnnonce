const userIcon = document.getElementById('user-icon');
const userMenu = document.getElementById('user-menu');

userMenu.style.display = 'none';

const hideOrDisplayUserMenu = () => {
	const displayValue = getComputedStyle(userMenu).display;

	if (displayValue == 'block') {
		userMenu.style.display = 'none';
	} else {
		userMenu.style.display = 'block';
	}
}

userIcon.addEventListener('click', hideOrDisplayUserMenu);

userMenu.addEventListener('mouseout', function(e) {
	const relatedTargetClassName = e.relatedTarget.className;

	if (relatedTargetClassName != 'user-navigation-link') {
		hideOrDisplayUserMenu();
	}
});
