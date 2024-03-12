
/* Display Or Hide The Setting Menu */

const announcementSettingIcon = document.getElementById('announcement-setting-icon');
const settingMenu = document.getElementById('setting-menu');

settingMenu.style.display = 'none';

const hideOrDisplaySettingMenu = () => {
    const settingMenuDisplayValue = getComputedStyle(settingMenu).display;

    if (settingMenuDisplayValue == 'block') {
        settingMenu.style.display = 'none';
    } else {
        settingMenu.style.display = 'block';
    }
}

announcementSettingIcon.addEventListener('click', hideOrDisplaySettingMenu);

/* Confirmation to delete the announcement */

const announcementDeleteButton = document.getElementById('announcement-delete-button');

const confirmDeletion = (e) => {
    e.preventDefault();

    const isConfirmed = confirm("Souhaitez-vous vraiment supprimer cette annonce ?");

    if (isConfirmed) {
        // Insert here the url to delete the announcement
        window.location.assign("#");
    }
}

announcementDeleteButton.addEventListener('click', confirmDeletion);