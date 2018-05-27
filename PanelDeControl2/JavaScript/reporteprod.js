function todos() {
    document.getElementById('todosprod').style.display = 'block';
    document.getElementById('enstock').style.display = 'none';
    document.getElementById('sinstock').style.display = 'none';
}

function enstock() {
    document.getElementById('todosprod').style.display = 'none';
    document.getElementById('enstock').style.display = 'block';
    document.getElementById('sinstock').style.display = 'none';
}

function sinstock() {
    document.getElementById('todosprod').style.display = 'none';
    document.getElementById('enstock').style.display = 'none';
    document.getElementById('sinstock').style.display = 'block';
}