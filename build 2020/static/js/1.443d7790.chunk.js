(window.webpackJsonp=window.webpackJsonp||[]).push([[1],{412:function(e,t,n){},414:function(e,t,n){},420:function(e,t,n){"use strict";n.r(t);var i=n(4),o=n(5),a=n(8),c=n(6),r=n(7),s=n(1),l=n.n(s),u=n(19),p=(n(412),n(28)),m=(n(414),n(26)),d=n(22),h=n(9),v=function(e){function t(e){var n;return Object(i.a)(this,t),(n=Object(a.a)(this,Object(c.a)(t).call(this,e))).state={activeIndex:0},n.next=n.next.bind(Object(d.a)(Object(d.a)(n))),n.previous=n.previous.bind(Object(d.a)(Object(d.a)(n))),n.goToIndex=n.goToIndex.bind(Object(d.a)(Object(d.a)(n))),n.onExiting=n.onExiting.bind(Object(d.a)(Object(d.a)(n))),n.onExited=n.onExited.bind(Object(d.a)(Object(d.a)(n))),n}return Object(r.a)(t,e),Object(o.a)(t,[{key:"onExiting",value:function(){this.animating=!0}},{key:"onExited",value:function(){this.animating=!1}},{key:"next",value:function(){if(!this.animating){var e=this.state.activeIndex===this.props.items.length-1?0:this.state.activeIndex+1;this.setState({activeIndex:e})}}},{key:"previous",value:function(){if(!this.animating){var e=0===this.state.activeIndex?this.props.items.length-1:this.state.activeIndex-1;this.setState({activeIndex:e})}}},{key:"goToIndex",value:function(e){this.animating||this.setState({activeIndex:e})}},{key:"render",value:function(){var e=this,t=this.state.activeIndex;if(0===this.props.items.length)return l.a.createElement("div",{style:{textAlign:"center",height:300}},l.a.createElement("img",{style:{marginTop:120},src:"/logoB.png",alt:"fisioterapia"}));var n=this.props.items.map(function(t){return l.a.createElement(h.e,{onExiting:e.onExiting,onExited:e.onExited,key:t.src},l.a.createElement("div",{className:"carusel__img__container"},l.a.createElement("img",{className:"carousel__img",src:t.src,alt:t.altText})))});return l.a.createElement(h.b,{activeIndex:t,next:this.next,previous:this.previous},l.a.createElement(h.d,{items:this.props.items,activeIndex:t,onClickHandler:this.goToIndex}),n,l.a.createElement(h.c,{direction:"prev",directionText:"Previous",onClickHandler:this.previous}),l.a.createElement(h.c,{direction:"next",directionText:"Next",onClickHandler:this.next}))}}]),t}(s.Component),b=function(e){function t(){return Object(i.a)(this,t),Object(a.a)(this,Object(c.a)(t).apply(this,arguments))}return Object(r.a)(t,e),Object(o.a)(t,[{key:"handleClick",value:function(e){this.props.servicioSectionClicked(e.target.id)}},{key:"render",value:function(){var e=this;return this.props.serviciosObject?l.a.createElement("div",null,l.a.createElement("div",{className:"container",style:{paddingBottom:"30px",textAlign:"center"}},l.a.createElement("h2",{style:{color:"#004383"}},"Servicios"),l.a.createElement("div",{className:"home__texto__border"})),l.a.createElement("div",{className:"row",style:{margin:0}},this.props.serviciosObject.servicios.map(function(t,n){return l.a.createElement("div",{key:n,className:"col-xs-4 col-sm-4 col-md-3 col-lg-3 col-xl-3 row",id:t.nombre,onClick:e.handleClick.bind(e),style:{width:"auto",cursor:"pointer"}},l.a.createElement("div",{className:"col-xs-3 col-sm-3 col-md-6 col-lg-6 col-xl-6",style:{width:"auto"},id:t.nombre},l.a.createElement("img",{alt:t.nombre,src:t.urlIcono,className:"home__servicios__img",id:t.nombre})),l.a.createElement("div",{className:"col-xs-9 col-sm-9 col-md-6 col-lg-6 col-xl-6",style:{width:"auto"},id:t.nombre},l.a.createElement("h4",{id:t.nombre,style:{color:"#004383"}},t.nombre)))}))):l.a.createElement("div",null,"Cargando los servicios... ")}}]),t}(s.Component),g=function(e){function t(){var e;return Object(i.a)(this,t),(e=Object(a.a)(this,Object(c.a)(t).call(this))).state={show:!1},e}return Object(r.a)(t,e),Object(o.a)(t,[{key:"handleClick",value:function(){this.setState({show:!1})}},{key:"componentDidMount",value:function(){this.setState({show:this.props.anuncio})}},{key:"render",value:function(){var e=this.props.anuncioTexto;return this.state.show?l.a.createElement("div",{style:{position:"fixed",top:0,left:0,width:"100%",height:"100%",backgroundColor:"rgba(0,0,0,0.25)",zIndex:167}},l.a.createElement("div",{style:{position:"absolute",backgroundColor:"white",color:"black",textAlign:"center",backgroundPosition:"center",backgroundSize:"cover",backgroundRepeat:"no-repeat",width:300,minHeight:100,margin:"0 auto",zIndex:168,top:"250px",left:"20px",right:"20px",border:"1px solid black",overflow:"auto",WebkitOverflowScrolling:"touch",borderRadius:"5px",outline:"none"}},l.a.createElement("button",{style:{backgroundColor:"#004383",color:"#fdb813",borderRadius:"5px"},onClick:this.handleClick.bind(this)},"X"),l.a.createElement("div",{style:{padding:10}},e.split("\n").map(function(e,t){return l.a.createElement("span",{key:t},e,l.a.createElement("br",null))})))):l.a.createElement("div",null)}}]),t}(l.a.Component),x=function(e){function t(){var e,n;Object(i.a)(this,t);for(var o=arguments.length,r=new Array(o),s=0;s<o;s++)r[s]=arguments[s];return(n=Object(a.a)(this,(e=Object(c.a)(t)).call.apply(e,[this].concat(r)))).servicioSectionClicked=function(e){m.a.push("/servicios");var t=e;setTimeout(function(){n.props.moveToSection(t.toLowerCase())},400)},n}return Object(r.a)(t,e),Object(o.a)(t,[{key:"render",value:function(){return l.a.createElement("div",null,l.a.createElement("div",null,this.props.copy.inicioCopy&&this.props.copy.inicioCopy.anuncio&&l.a.createElement(g,{anuncio:this.props.copy.inicioCopy.anuncio,anuncioTexto:this.props.copy.inicioCopy.anuncioTexto})),l.a.createElement("div",{className:"home__texto__super__container"},l.a.createElement("div",{className:"home__texto__border"}),l.a.createElement("div",{className:"home__texto__corto__container"},this.props.copy.inicioCopy?this.props.copy.inicioCopy.inicioTextoCorto.split("\n").map(function(e,t){return l.a.createElement("span",{key:t},e,l.a.createElement("br",null))}):l.a.createElement("div",null)),l.a.createElement("div",null)),l.a.createElement("div",{className:"carousel__container"},l.a.createElement(v,{items:this.props.copy.inicioCopy?this.props.copy.inicioCopy.items:[]})),l.a.createElement("div",{className:"home__servicios__container"},l.a.createElement(b,{serviciosObject:this.props.copy.serviciosCopy,servicioSectionClicked:this.servicioSectionClicked})),l.a.createElement("div",{className:"home__texto__super__container"},l.a.createElement("div",{className:"home__texto__largo__container"},this.props.copy.inicioCopy?this.props.copy.inicioCopy.inicioTextoLargo.split("\n").map(function(e,t){return l.a.createElement("span",{key:t},e,l.a.createElement("br",null))}):l.a.createElement("div",null))))}}]),t}(s.Component),y=Object(u.b)(function(e){return{navigation:e.navigation,copy:e.copy}},function(e){return{moveToSection:function(t){return e(p.a.moveToSection(t))}}})(x),E=function(e){function t(){var e,n;Object(i.a)(this,t);for(var o=arguments.length,r=new Array(o),s=0;s<o;s++)r[s]=arguments[s];return(n=Object(a.a)(this,(e=Object(c.a)(t)).call.apply(e,[this].concat(r)))).closeMenuIfNeeded=function(){n.props.navigation.mobileTopMenu&&n.props.toggleMobileTopMenu(!1)},n}return Object(r.a)(t,e),Object(o.a)(t,[{key:"render",value:function(){var e=this.props.navigation.mobileTopMenu?{animationName:"moveDownSlowly"}:{animationDelay:"0.5s",animationName:"moveUpSlowly"};return l.a.createElement("div",{className:"layout__container",onClick:this.closeMenuIfNeeded,style:e},l.a.createElement(y,null))}}]),t}(s.Component);t.default=Object(u.b)(function(e){return{navigation:e.navigation}},function(e){return{toggleMobileTopMenu:function(t){return e(p.a.toggleMobileTopMenu(t))}}})(E)}}]);
//# sourceMappingURL=1.443d7790.chunk.js.map