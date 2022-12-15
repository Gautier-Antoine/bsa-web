if (document.querySelector('.wp-block-query.query-slider')) {
    const block = document.querySelector('.wp-block-query.query-slider');
    const ul = block.querySelector('ul');

    var controls = document.createElement('div');
    controls.classList.add('controls');
    ul.querySelectorAll('li').forEach((element, id) => {
        var bullet = document.createElement('div');
        bullet.classList.add('bullet');
        bullet.id = 'number-' + id;
        if (id === 0) {
            bullet.classList.add('active');
        }
        bullet.onclick = function () {
            controls.querySelectorAll('.bullet').forEach((elem) => {
                elem.classList.remove('active');
                ul.classList.remove(elem.id);
            })
            this.classList.add('active');
            ul.classList.add(this.id);
        }
        controls.appendChild(bullet);
    });
    block.appendChild(controls);

    var text = block.querySelector('p.has-text-align-right');
    var clone = text.cloneNode(true);
    clone.classList.remove('has-text-align-right');
    clone.classList.add('has-text-align-center', 'mobile');
    text.classList.add('desktop');
    block.appendChild(clone);

}