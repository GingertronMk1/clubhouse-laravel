import "./bootstrap";

import "../scss/app.scss";

// import * as bootstrap from 'bootstrap';
import Alpine from "alpinejs";

declare global {
    interface Window {
        Alpine: typeof Alpine;
    }
}

window.Alpine = Alpine;

Alpine.start();

if (document.getElementById("create-position-form")) {
    (function () {
        const newPositionIcon = document.createElement("i", {});
        newPositionIcon.classList.add("fa-regular", "fa-user");
        newPositionIcon.setAttribute("title", "New Position");
        newPositionIcon.style.left = "50%";
        newPositionIcon.style.bottom = "50%";
        newPositionIcon.id = "NEW POSITION";
        const positionDisplay: HTMLElement | null = document.querySelector(
            "[data-sport-id='{{ $sport->id }}']",
        );
        if (!positionDisplay) {
            console.error("No position display");
            return;
        }
        positionDisplay.appendChild(newPositionIcon);

        const previewX: HTMLInputElement | null = document.querySelector(
            "input[type='range'][name='preview_x']",
        );
        const previewY: HTMLInputElement | null = document.querySelector(
            "input[type='range'][name='preview_y']",
        );

        if (!(previewX && previewY)) {
            console.error("No preview position");
            return;
        }

        previewX.addEventListener("input", function (e: InputEvent) {
            if (e.target instanceof HTMLInputElement) {
                newPositionIcon.style.left = `${e.target.value}%`;
            }
        });

        previewY.addEventListener("input", function (e) {
            if (e.target instanceof HTMLInputElement) {
                newPositionIcon.style.bottom = `${e.target.value}%`;
            }
        });
    })();
}

if (document.getElementById("edit-position-form")) {
    (function () {
        const positionIdInput: HTMLInputElement | null = document.querySelector(
            "#edit-position-form > input[name=id]",
        );
        if (!positionIdInput) {
            console.error("No position ID found");
            return;
        }
        const positionId = positionIdInput.value;
        const positionIcon: HTMLElement | null = document.querySelector(
            `i[data-position-id='${positionId}']`,
        );
        if (!positionIcon) {
            console.error("No position icon found");
            return;
        }
        positionIcon.classList.remove("fa-solid");
        positionIcon.classList.add("fa-regular");
        document
            .querySelector("input[type='range'][name='preview_x']")
            ?.addEventListener("input", function (e: InputEvent) {
                const { value } = e.target as HTMLInputElement;
                positionIcon.style.left = `${value}%`;
            });
        document
            .querySelector("input[type='range'][name='preview_y']")
            ?.addEventListener("input", function (e: InputEvent) {
                const { value } = e.target as HTMLInputElement;
                positionIcon.style.bottom = `${value}%`;
            });
    })();
}
