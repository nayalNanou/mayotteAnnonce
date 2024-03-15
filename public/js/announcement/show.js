
/* Display Or Hide The Setting Menu */

const announcementSettingIcon = document.getElementById('announcement-setting-icon');
const settingMenu = document.getElementById('setting-menu');

if (announcementSettingIcon && settingMenu) {
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
}

/* Confirmation to delete the announcement */

// const announcementDeleteButton = document.getElementById('announcement-delete-button');

// const confirmDeletion = (e) => {
//     e.preventDefault();
//     const targetPath = e.target.href;

//     const isConfirmed = confirm("Souhaitez-vous vraiment supprimer cette annonce ?");

//     if (isConfirmed) {
//         window.location.replace(targetPath);
//     }
// }

// announcementDeleteButton.addEventListener('click', confirmDeletion);