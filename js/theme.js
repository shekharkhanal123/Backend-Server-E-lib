function darkmode(){
    // theme change 
    const wasDarkmode = localStorage.getItem('darkmode') === 'true';
    localStorage.setItem('darkmode', !wasDarkmode);
    const element =document.body;
    element.classList.toggle('dark-mode', !wasDarkmode);

    // button change
    checkdark.classList.toggle('active', !wasDarkmode);
}

function onload(){
        // theme change 
    document.body.classList.toggle('dark-mode',localStorage.getItem('darkmode')==='true');

    // button change
    checkdark.classList.toggle('active',localStorage.getItem('darkmode')==='true');
}