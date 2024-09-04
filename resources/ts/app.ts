import './bootstrap';

import '../scss/app.scss';

// import * as bootstrap from 'bootstrap';
import Alpine from 'alpinejs';

declare global {
    interface Window {
        Alpine: typeof Alpine;
    }
}

window.Alpine = Alpine;

Alpine.start();

if (document.getElementById('create-position-form')) {
    const newPositionIcon = document.createElement('i', {});
    newPositionIcon.classList.add('fa-regular', 'fa-user');
    newPositionIcon.setAttribute('title', 'New Position');
    newPositionIcon.style.left = '50%';
    newPositionIcon.style.bottom = '50%';
    newPositionIcon.id = 'NEW POSITION';
    const positionDisplay = document.querySelector('[data-sport-id=\'{{ $sport->id }}\']');
    positionDisplay.appendChild(newPositionIcon);

    const previewX: HTMLInputElement = document.querySelector('input[type=\'range\'][name=\'preview_x\']');

    previewX.addEventListener(
        'input',
        function (e: InputEvent) {
            if (e.target instanceof HTMLInputElement) {
                newPositionIcon.style.left = `${e.target.value}%`;
            }
        }
    );

    const previewY: HTMLInputElement = document.querySelector('input[type=\'range\'][name=\'preview_y\']');
    previewY.addEventListener(
        'input',
        function (e) {
            if (e.target instanceof HTMLInputElement) {
                newPositionIcon.style.bottom = `${e.target.value}%`;
            }
        }
    );
}

if (document.getElementById('edit-position-form')) {
    const positionIdInput: HTMLInputElement | null = document.querySelector('#edit-position-form > input[name=id]');
    const positionId = positionIdInput.value;
    const positionIcon: HTMLElement | null = document.querySelector(`i[data-position-id='${positionId}']`);
    positionIcon.classList.remove('fa-solid');
    positionIcon.classList.add('fa-regular')
    document.querySelector('input[type=\'range\'][name=\'preview_x\']')?.addEventListener(
        'input',
        function (e: InputEvent) {
            if (e.target instanceof HTMLInputElement) {
                if (!positionIcon) {
                    return;
                }

                positionIcon.style.left = `${e.target.value}%`;
            }
        }
    )
    document.querySelector('input[type=\'range\'][name=\'preview_y\']')?.addEventListener(
        'input',
        function (e: InputEvent) {

            if (e.target instanceof HTMLInputElement) {
                if (!positionIcon) {
                    return;
                }

                positionIcon.style.bottom = `${e.target.value}%`;
            }

        }
    )
}
