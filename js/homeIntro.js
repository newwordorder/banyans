window.onload = function(){
    let tl = new TimelineMax();

    const backgroundImage = name => {return document.querySelector(`${name}`).querySelector('.background-image-holder')};
    
    const customEase = () => CustomEase.create("custom", "M0,0 C0.25,0.1 0.25,1 1,1");

    const setup = () => {
        tl.add( TweenLite.set('.page-header', {height:'100vh'}) );
        tl.add( TweenLite.set('.page-header', {overflow:'hidden'}) );
        tl.add( TweenLite.set( '.remainder', {opacity:0, transform: 'translateY(10px)'}));
        tl.add( TweenLite.set('.header-top', {opacity:0}) );
        tl.add( TweenLite.set('.header-bottom', {opacity:0}) );
        tl.add( TweenLite.set('.page-title', {opacity:0}) );
        tl.add( TweenLite.set('.heading__split', {opacity:0}) );
        tl.add( TweenLite.set('.heading__split--title', {opacity:0}) );
        tl.add( TweenLite.set('.overlap__section', {opacity:0}) );

        tl.add( TweenLite.set(backgroundImage('.page-header'), {height: '120%', width: '120%', transform: 'translate(-10%)'}))
    }

    const backgroundZoom = () => {
        tl.to(backgroundImage('.page-header'), 1.8, {height: '100%', width: '100%',  transform: 'translate(-0%)', ease: customEase() });
        tl.to('.page-header', 1, {height: '60vh', ease: customEase() }, '-=1.8');
        tl.to('.overlap__section', 1, {opacity: 1, ease: customEase() }, '-=2.8');
        tl.to('.remainder', 0.6, {opacity: '1', transform: 'translateY(0px)', ease: customEase() }, '-=0.8');

    }

    function runAnimation(){
        setup();
        backgroundZoom();
    }

    runAnimation();

    document.body.addEventListener('click', function(){
        runAnimation();
    })
}