function ScrollReveal(){

    const sections = () => Array.from(document.querySelector('.remainder').children)

    const bottomY = () => window.scrollY + window.innerHeight;

    const objectEnd = element => element.offsetTop + element.offsetHeight - 200;

    const isVisible = element => objectEnd(element) < bottomY();

    const init = () => {}
    
    const a = sections();
    
    a.forEach(section => {
        let u = Array.from(section.children);
        u.forEach( element => {
            if(isVisible(element)){
                TweenLite.set(element, {opacity:0});
            }
        })
    })

    document.addEventListener('scroll', function(){
        a.forEach(section => {
            let u = Array.from(section.children);
            u.forEach( element => {
                if(isVisible(element)){
                    TweenLite.to(element, 1, {opacity:1});
                }
            })
        })
    })

}