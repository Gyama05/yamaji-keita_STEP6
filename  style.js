console.log("style.js 読み込まれた");



document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form");

    form.addEventListener("submit", (e) => {
        let errors = [];

        const name = document.getElementById("name").value.trim();
        const company = document.getElementById("companyName").value.trim();
        const email = document.getElementById("email").value.trim();
        const age = document.getElementById("age").value.trim();
        const message = document.getElementById("message").value.trim();

        if (!name) errors.push("必須項目が未入力です。入力内容をご確認ください。");
        if (!company) errors.push("必須項目が未入力です。入力内容をご確認ください。");
        if (!email) errors.push("必須項目が未入力です。入力内容をご確認ください。");
        if (!age) errors.push("必須項目が未入力です。入力内容をご確認ください。");
        if (!message) errors.push("必須項目が未入力です。入力内容をご確認ください。");

        if (errors.length > 0) {
            e.preventDefault();
            alert(errors.join("\n"));
        }
    });
});
