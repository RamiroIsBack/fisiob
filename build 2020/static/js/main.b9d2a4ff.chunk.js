(window.webpackJsonp=window.webpackJsonp||[]).push([[0],{166:function(e,t,n){"use strict";var a=n(4),o=n(5),i=n(8),c=n(6),r=n(7),l=n(1),s=n.n(l),u=n(19),p=n(39),d=function(e){function t(){var e;return Object(a.a)(this,t),(e=Object(i.a)(this,Object(c.a)(t).call(this))).state={mapa:null},e}return Object(r.a)(t,e),Object(o.a)(t,[{key:"makeMarker",value:function(){var e=this;return s.a.createElement(p.Marker,{position:{lat:40.4474684,lng:-3.6991291},onClick:function(){return e.handleClick("https://www.google.com/maps/place/Fisioterapia+Buend%C3%ADa/@40.4474725,-3.7013178,17z/data=!3m1!4b1!4m5!3m4!1s0xd4228f93ff787fb:0x39239806bd70c985!8m2!3d40.4474684!4d-3.6991291")}},s.a.createElement(p.InfoWindow,null,s.a.createElement("div",{style:{maxWidth:600,padding:0,margin:0}},s.a.createElement("img",{role:"presentation",src:"/logoB.png",className:"infoWindow__img",alt:"foto",id:"fotoInfoWindow",style:{opacity:.9,maxHeight:60,maxWidth:100,cursor:"pointer",marginRight:"2px"},onClick:function(){return e.handleClick("https://www.google.com/maps/place/Fisioterapia+Buend%C3%ADa/@40.4474725,-3.7013178,17z/data=!3m1!4b1!4m5!3m4!1s0xd4228f93ff787fb:0x39239806bd70c985!8m2!3d40.4474684!4d-3.6991291")}}),this.props.normalColor&&s.a.createElement("div",null,s.a.createElement("p",{style:{margin:"5px 0 5px 0"}},"C/ Artistas 57")))))}},{key:"handleClick",value:function(e){window.open(e,"_blank")}},{key:"render",value:function(){var e=this.makeMarker();return s.a.createElement(p.GoogleMap,{defaultOptions:{styles:this.props.normalColor?[]:[{featureType:"road",elementType:"geometry",stylers:[{lightness:100},{visibility:"simplified"}]},{featureType:"road",elementType:"labels",stylers:[{visibility:"off"}]},{featureType:"transit.line",elementType:"geometry",stylers:[{visibility:"on"},{lightness:700}]}]},defaultZoom:15,defaultCenter:{lat:40.4487829,lng:-3.6989253}},e)}}]),t}(l.Component),m=Object(p.withGoogleMap)(d),E=function(e){function t(){return Object(a.a)(this,t),Object(i.a)(this,Object(c.a)(t).apply(this,arguments))}return Object(r.a)(t,e),Object(o.a)(t,[{key:"render",value:function(){return s.a.createElement("div",null,s.a.createElement(m,{normalColor:!!this.props.normalColor,containerElement:s.a.createElement("div",{style:{height:this.props.mapHeigth||"260px"}}),mapElement:s.a.createElement("div",{style:{height:"100%"}})}))}}]),t}(l.Component);t.a=Object(u.b)(function(e){return{section:e.section,copy:e.copy}},null)(Object(p.withScriptjs)(E))},173:function(e,t,n){e.exports=n(410)},178:function(e,t,n){},210:function(e,t,n){},26:function(e,t,n){"use strict";var a=n(169),o=n.n(a)()();t.a=o},28:function(e,t,n){"use strict";var a=n(3);t.a={toggleMobileTopMenu:function(e){return{type:a.a.TOGGLE_MOBILE_TOP_MENU,data:e}},moveToSection:function(e){return{type:a.a.MOVE_TO_SECTION,data:e}},cierraCookiesAviso:function(){return{type:a.a.CIERRA_COOKIES_AVISO,data:!1}},inicioReceived:function(e){return{type:a.a.INICIO_RECEIVED,data:e}},equipoReceived:function(e){return{type:a.a.EQUIPO_RECEIVED,data:e}},instalacionesReceived:function(e){return{type:a.a.INSTALACIONES_RECEIVED,data:e}},tarifasReceived:function(e){return{type:a.a.TARIFAS_RECEIVED,data:e}},serviciosReceived:function(e){return{type:a.a.SERVICIOS_RECEIVED,data:e}},tecnicasReceived:function(e){return{type:a.a.TECNICAS_RECEIVED,data:e}},contactoReceived:function(e){return{type:a.a.CONTACTO_RECEIVED,data:e}}}},3:function(e,t,n){"use strict";t.a={CONTENIDOS_RECEIVED:"CONTENIDOS_RECEIVED",MOVE_CAROUSELL:"MOVE_CAROUSELL",TOGGLE_MOBILE_TOP_MENU:"TOGGLE_MOBILE_TOP_MENU",MOVE_TO_SECTION:"MOVE_TO_SECTION",CIERRA_COOKIES_AVISO:"CIERRA_COOKIES_AVISO",INICIO_RECEIVED:"INICIO_RECEIVED",EQUIPO_RECEIVED:"EQUIPO_RECEIVED",INSTALACIONES_RECEIVED:"INSTALACIONES_RECEIVED",TARIFAS_RECEIVED:"TARIFAS_RECEIVED",SERVICIOS_RECEIVED:"SERVICIOS_RECEIVED",TECNICAS_RECEIVED:"TECNICAS_RECEIVED",CONTACTO_RECEIVED:"CONTACTO_RECEIVED"}},407:function(e,t,n){},410:function(e,t,n){"use strict";n.r(t);var a=n(1),o=n.n(a),i=n(27),c=n.n(i),r=(n(178),n(4)),l=n(5),s=n(8),u=n(6),p=n(7),d=n(19),m=n(425),E=n(421),h=n(26),f=(n(188),n(32)),v=n(100),g=n(3),C={listaContenidos:[],ContenidosLoaded:!1,carousellBackground:{urlPic:"",num:1,carousellLength:5}},y=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:C,t=arguments.length>1?arguments[1]:void 0,n=Object.assign({},e);switch(t.type){case g.a.MOVE_CAROUSELL:if(0!==n.listaContenidos.length)for(var a=0;a<n.listaContenidos.length;a++){var o=n.listaContenidos[a];if("carousell"===o.id){var i=0,c="";"atras"===t.data?(c="pic"+(i=(i=n.carousellBackground.num-1)<1?n.carousellBackground.carousellLength:i),n.carousellBackground.urlPic=o[c].urlPicCarousell,n.carousellBackground.num=i):"alante"===t.data?(c="pic"+(i=(i=n.carousellBackground.num+1)>n.carousellBackground.carousellLength?1:i),n.carousellBackground.urlPic=o[c].urlPicCarousell,n.carousellBackground.num=i):(c="pic"+(i=t.data+1),n.carousellBackground.urlPic=o[c].urlPicCarousell,n.carousellBackground.num=i)}}return n;case g.a.INICIO_RECEIVED:return n.inicioCopy=t.data,n;case g.a.EQUIPO_RECEIVED:return n.equipoCopy=t.data,n;case g.a.INSTALACIONES_RECEIVED:return n.instalacionesCopy=t.data,n;case g.a.SERVICIOS_RECEIVED:return n.serviciosCopy=t.data,n;case g.a.TECNICAS_RECEIVED:return n.tecnicasCopy=t.data,n;case g.a.CONTACTO_RECEIVED:return n.contactoCopy=t.data,n;default:return e}},O={mobileTopMenu:!1,serviceSelected:"",showAvisoCookies:!0},b=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:O,t=arguments.length>1?arguments[1]:void 0,n=Object.assign({},e);switch(t.type){case g.a.TOGGLE_MOBILE_TOP_MENU:return n.mobileTopMenu=t.data,n;case g.a.MOVE_TO_SECTION:return n.serviceSelected=t.data,n;case g.a.CIERRA_COOKIES_AVISO:return n.showAvisoCookies=t.data,n;default:return e}},_=function(e){var t=Object(f.c)({copy:y,navigation:b});return e?Object(f.d)(t,e,Object(f.a)(v.a)):Object(f.d)(t,Object(f.a)(v.a))},k=n(101),I=n.n(k),w=n(170),T=function(e){return function(t){function n(e){var t;return Object(r.a)(this,n),(t=Object(s.a)(this,Object(u.a)(n).call(this,e))).state={component:null},t}return Object(p.a)(n,t),Object(l.a)(n,[{key:"componentDidMount",value:function(){var t=Object(w.a)(I.a.mark(function t(){var n,a;return I.a.wrap(function(t){for(;;)switch(t.prev=t.next){case 0:return t.next=2,e();case 2:n=t.sent,a=n.default,this.setState({component:a});case 5:case"end":return t.stop()}},t,this)}));return function(){return t.apply(this,arguments)}}()},{key:"render",value:function(){var e=this.state.component;return e?o.a.createElement(e,this.props):null}}]),n}(a.Component)},j=T(function(){return n.e(1).then(n.bind(null,420))}),R=T(function(){return n.e(2).then(n.bind(null,423))}),N=T(function(){return n.e(3).then(n.bind(null,422))}),S=T(function(){return n.e(4).then(n.bind(null,426))}),A=T(function(){return n.e(5).then(n.bind(null,427))}),L=T(function(){return n.e(6).then(n.bind(null,424))}),V=n(22),M=n(46),x=n.n(M),D=n(9),P=n(28),B=(n(210),{urlLink:915349476,urlPic:"https://firebasestorage.googleapis.com/v0/b/resume-40a8a.appspot.com/o/fotos%2FphoneTrans.png?alt=media&token=0cbada0e-7f74-40f9-a0cf-4c4b905ea110"}),U={urlLink:"info@fisioterapiabuendia.com",urlPic:"https://firebasestorage.googleapis.com/v0/b/resume-40a8a.appspot.com/o/fotos%2FmailTrans.png?alt=media&token=9ba4796a-b2fa-4491-9fc8-1d87a53d7105"},W=function(e){function t(){return Object(r.a)(this,t),Object(s.a)(this,Object(u.a)(t).apply(this,arguments))}return Object(p.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){var e=B,t=U;return this.props.copy.contactoCopy&&(e=this.props.copy.contactoCopy.telCopy,t=this.props.copy.contactoCopy.emailCopy),o.a.createElement("div",null,o.a.createElement("div",{className:"tel__container"},o.a.createElement("div",{className:"tel__pic"},o.a.createElement("a",{href:"tel:"+e.urlLink,style:{color:"white",fontWeight:"bold"}},o.a.createElement("img",{className:"picPhoto",alt:"tel",src:e.urlPic}))),o.a.createElement("div",{className:"tel"},o.a.createElement("a",{href:"tel:"+e.urlLink,style:{color:"white",fontWeight:"bold"}},e.urlLink))),o.a.createElement("div",{style:{width:"80%",cursor:"default",textAlign:"center",color:"white",fontWeight:"lighter",margin:"auto"}},o.a.createElement("p",{style:{padding:0,margin:0}},"consultas y citas")),o.a.createElement("div",{className:"mail__container"},o.a.createElement("div",{className:"mail__pic"},o.a.createElement("a",{href:"mailto:"+t.urlLink,style:{color:"white",fontWeight:"bold"}},o.a.createElement("img",{className:"picPhoto",src:t.urlPic,alt:"mail"}))),o.a.createElement("div",{className:"mail"},o.a.createElement("a",{href:"mailto:"+t.urlLink,style:{color:"white",fontWeight:"bold"}},t.urlLink))))}}]),t}(a.Component),G=Object(d.b)(function(e){return{copy:e.copy}},null)(W),q=function(e){function t(e){var n;return Object(r.a)(this,t),(n=Object(s.a)(this,Object(u.a)(t).call(this,e))).toggle=n.toggle.bind(Object(V.a)(Object(V.a)(n))),n.closeMenu=n.closeMenu.bind(Object(V.a)(Object(V.a)(n))),n.handleOnClick=n.handleOnClick.bind(Object(V.a)(Object(V.a)(n))),n}return Object(p.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){var e=this,t="https://stormy-meadow-66204.herokuapp.com";x()({method:"get",url:"".concat(t,"/copy/inicio")}).then(function(n){e.props.inicioReceived(n.data.inicioCopy[0]),x()({method:"get",url:"".concat(t,"/copy/servicios")}).then(function(n){e.props.serviciosReceived(n.data.serviciosCopy[0]),x()({method:"get",url:"".concat(t,"/copy/tecnicas")}).then(function(t){e.props.tecnicasReceived(t.data.tecnicasCopy[0])})})}).catch(function(e){console.log(e)})}},{key:"toggle",value:function(){this.props.navigation&&this.props.toggleMobileTopMenu(!this.props.navigation.mobileTopMenu)}},{key:"closeMenu",value:function(){this.props.navigation&&this.props.navigation.mobileTopMenu&&this.props.toggleMobileTopMenu(!1)}},{key:"handleOnClick",value:function(e){var t=this;if("servicios"===e.target.id)this.props.moveToSection("");else if("equipo"===e.target.id)h.a.push("/equipo"),this.props.moveToSection("");else if("instalaciones"===e.target.id)h.a.push("/instalaciones"),this.props.moveToSection("");else if("tarifas"===e.target.id)h.a.push("/tarifas"),this.props.moveToSection("");else if("contacto"===e.target.id)h.a.push("/contacto"),this.props.moveToSection("");else{h.a.push("/servicios");var n=e.target.id;setTimeout(function(){t.props.moveToSection(n.toLowerCase())},400)}"servicios"!==e.target.id&&(window.scrollTo(0,0),this.closeMenu())}},{key:"render",value:function(){var e=this,t=void 0;return this.props.copy&&this.props.copy.serviciosCopy&&(t=this.props.copy.serviciosCopy),o.a.createElement("div",null,o.a.createElement(D.n,{fixed:"top",style:{paddingBottom:1},color:"white",light:!0,expand:"sm"},o.a.createElement(D.o,{style:{backgroundColor:"#fdb813"},onClick:this.toggle}),o.a.createElement("div",{style:{padding:"2px 5px 0 5px",borderRadius:"20px",backgroundColor:"#004383"}},o.a.createElement(G,null)),o.a.createElement(D.g,{isOpen:this.props.navigation.mobileTopMenu,navbar:!0,style:{borderRadius:"5px",backgroundColor:"#fdb813"}},o.a.createElement(D.k,{className:"navbar-nav w-100 justify-content-around"},o.a.createElement(D.l,null,o.a.createElement(D.m,{style:{paddingLeft:"6px",cursor:"pointer"},id:"equipo",onClick:this.handleOnClick},"EQUIPO")),o.a.createElement(D.l,null,o.a.createElement(D.m,{style:{paddingLeft:"6px",cursor:"pointer"},id:"instalaciones",onClick:this.handleOnClick},"INSTALACIONES")),o.a.createElement(D.l,null,o.a.createElement(D.m,{style:{paddingLeft:"6px",cursor:"pointer"},id:"tarifas",onClick:this.handleOnClick},"TARIFAS")),o.a.createElement(D.l,null,o.a.createElement(D.m,{style:{paddingLeft:"6px",cursor:"pointer"},id:"contacto",onClick:this.handleOnClick},"CONTACTO")),o.a.createElement(D.q,{nav:!0,inNavbar:!0},o.a.createElement(D.j,{nav:!0,caret:!0,id:"servicios",style:{paddingLeft:"6px",cursor:"pointer"},onClick:this.handleOnClick},"SERVICIOS"),o.a.createElement(D.i,{right:!0},t?t.servicios.map(function(t,n){return o.a.createElement("div",{key:n,id:t.nombre,onClick:e.handleOnClick,style:{cursor:"pointer",padding:3,width:"fit-content"}},o.a.createElement("div",{key:n,style:{display:"inline-block"}},o.a.createElement("div",{style:{display:"inline-block"}},o.a.createElement("img",{alt:t.nombre,src:t.urlIcono,style:{height:38},id:t.nombre,onClick:e.handleOnClick})),o.a.createElement("div",{style:{display:"inline-block",paddingLeft:"8px"},id:t.nombre,onClick:e.handleOnClick},t.nombre)))}):o.a.createElement("div",null)))))))}}]),t}(o.a.Component),F=Object(d.b)(function(e){var t=e.copy;return{navigation:e.navigation,copy:t}},function(e){return{toggleMobileTopMenu:function(t){return e(P.a.toggleMobileTopMenu(t))},moveToSection:function(t){return e(P.a.moveToSection(t))},inicioReceived:function(t){return e(P.a.inicioReceived(t))},serviciosReceived:function(t){return e(P.a.serviciosReceived(t))},tecnicasReceived:function(t){return e(P.a.tecnicasReceived(t))}}})(q),Q=(n(75),function(e){function t(){var e,n;Object(r.a)(this,t);for(var a=arguments.length,o=new Array(a),i=0;i<a;i++)o[i]=arguments[i];return(n=Object(s.a)(this,(e=Object(u.a)(t)).call.apply(e,[this].concat(o)))).handleClick=function(){window.scrollTo(0,0),h.a.push("/")},n}return Object(p.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){return o.a.createElement("div",null,o.a.createElement("img",{className:"logo__top__img",src:"/logoB.png",onClick:this.handleClick,alt:"logo"}))}}]),t}(a.Component)),K=Object(d.b)(null,null)(Q),H=function(e){function t(){var e;return Object(r.a)(this,t),(e=Object(s.a)(this,Object(u.a)(t).call(this))).state={showAlert:!1},e.handleClick=e.handleClick.bind(Object(V.a)(Object(V.a)(e))),e}return Object(p.a)(t,e),Object(l.a)(t,[{key:"componentDidMount",value:function(){var e=this;x()({method:"get",url:"".concat("https://stormy-meadow-66204.herokuapp.com","/copy/contacto")}).then(function(t){e.props.contactoReceived(t.data.contactoCopy[0])}).catch(function(e){console.log(e)})}},{key:"handleClick",value:function(e){"masInfo"===e.target.id&&this.setState({showAlert:!0}),"aceptar"===e.target.id&&this.props.cierraCookiesAviso()}},{key:"render",value:function(){return!this.props.navigation||this.props.navigation.showAvisoCookies&&this.props.copy.contactoCopy?o.a.createElement("div",{className:"cookies__aviso"},this.state.showAlert&&o.a.createElement("div",null,o.a.createElement(D.a,{color:"secundary"},this.props.copy.contactoCopy.cookiesTextoLargo)),o.a.createElement("h6",{style:{display:"inline"}},this.props.copy.contactoCopy.cookiesTextoCorto),o.a.createElement("h5",{id:"masInfo",onClick:this.handleClick,style:{display:"inline",fontWeight:"bold",cursor:"pointer"}}," ","aqu\xed"," "),"para m\xe1s informaci\xf3n",o.a.createElement("button",{id:"aceptar",style:{border:"1px solid white",display:"inline",backgroundColor:"black",marginLeft:"5px",color:"white",cursor:"pointer"},onClick:this.handleClick},"Aceptar")):null}}]),t}(a.Component),z=Object(d.b)(function(e){return{navigation:e.navigation,copy:e.copy}},function(e){return{cierraCookiesAviso:function(){return e(P.a.cierraCookiesAviso())},contactoReceived:function(t){return e(P.a.contactoReceived(t))}}})(H),J=n(166),Z=(n(407),function(e){function t(){return Object(r.a)(this,t),Object(s.a)(this,Object(u.a)(t).apply(this,arguments))}return Object(p.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){if(!this.props.contactoCopy)return null;var e=this.props.contactoCopy,t=e.telCopy,n=e.emailCopy,a=e.horario,i=e.direccion,c="https://maps.googleapis.com/maps/api/js?key=".concat(i.apiKey,".exp&libraries=geometry,drawing,places");return o.a.createElement("div",{className:"footer__container"},o.a.createElement("div",{className:"footer__map__container"},o.a.createElement(J.a,{googleMapURL:c,loadingElement:o.a.createElement("div",{style:{height:"100%"}})})),o.a.createElement("div",{className:"footer__tel__container"},o.a.createElement("div",{className:"footer__tel__pic"},o.a.createElement("a",{href:"tel:"+t.urlLink,style:{color:"white"}},o.a.createElement("img",{className:"footer__picPhoto",alt:"tel",src:t.urlPic}))),o.a.createElement("div",{className:"footer__tel"},o.a.createElement("a",{href:"tel:"+t.urlLink,style:{color:"white"}},t.urlLink))),o.a.createElement("div",{className:"footer__mail__container"},o.a.createElement("div",{className:"footer__mail__pic"},o.a.createElement("a",{href:"mailto:"+n.urlLink,style:{color:"white"}},o.a.createElement("img",{className:"footer__picPhoto",src:n.urlPic,alt:"mail"}))),o.a.createElement("div",{className:"footer__mail"},o.a.createElement("a",{href:"mailto:"+n.urlLink,style:{color:"white"}},n.urlLink))),o.a.createElement("div",{className:"footer__horario__container"},o.a.createElement("div",{style:{marginLeft:"5px",color:"white"}},a)),o.a.createElement("div",{className:"footer__direccion__container"},o.a.createElement("a",{href:i.urlLink,style:{marginLeft:"5px",textAlign:"left",color:"white"}},i.nombre)))}}]),t}(a.Component)),$=Object(d.b)(function(e){return e.copy},null)(Z),X=function(e){function t(){return Object(r.a)(this,t),Object(s.a)(this,Object(u.a)(t).apply(this,arguments))}return Object(p.a)(t,e),Object(l.a)(t,[{key:"render",value:function(){var e={minHeight:window.innerHeight};return o.a.createElement(d.a,{store:_(null)},o.a.createElement(m.a,{history:h.a},o.a.createElement("div",{className:"general__container",style:e},o.a.createElement("div",{className:"sticky__navbar__contanier"},o.a.createElement(F,null)),o.a.createElement("div",{className:"logo__top__container"},o.a.createElement(K,null)),o.a.createElement("div",{className:"main__container"},o.a.createElement(E.a,{exact:!0,path:"/",component:j}),o.a.createElement(E.a,{path:"/Equipo",component:R}),o.a.createElement(E.a,{path:"/Servicios",component:N}),o.a.createElement(E.a,{path:"/Tarifas",component:A}),o.a.createElement(E.a,{path:"/Contacto",component:L}),o.a.createElement(E.a,{path:"/Instalaciones",component:S})),o.a.createElement("div",{className:"cookies__aviso__container"},o.a.createElement(z,null)),o.a.createElement("div",{className:"footer__container__general"},o.a.createElement($,null)))))}}]),t}(a.Component),Y=Boolean("localhost"===window.location.hostname||"[::1]"===window.location.hostname||window.location.hostname.match(/^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/));function ee(e,t){navigator.serviceWorker.register(e).then(function(e){e.onupdatefound=function(){var n=e.installing;n.onstatechange=function(){"installed"===n.state&&(navigator.serviceWorker.controller?(console.log("New content is available; please refresh."),t.onUpdate&&t.onUpdate(e)):(console.log("Content is cached for offline use."),t.onSuccess&&t.onSuccess(e)))}}}).catch(function(e){console.error("Error during service worker registration:",e)})}c.a.render(o.a.createElement(X,null),document.getElementById("root")),function(e){if("serviceWorker"in navigator){if(new URL("",window.location).origin!==window.location.origin)return;window.addEventListener("load",function(){var t="".concat("","/service-worker.js");Y?(function(e,t){fetch(e).then(function(n){404===n.status||-1===n.headers.get("content-type").indexOf("javascript")?navigator.serviceWorker.ready.then(function(e){e.unregister().then(function(){window.location.reload()})}):ee(e,t)}).catch(function(){console.log("No internet connection found. App is running in offline mode.")})}(t,e),navigator.serviceWorker.ready.then(function(){console.log("This web app is being served cache-first by a service worker. To learn more, visit https://goo.gl/SC7cgQ")})):ee(t,e)})}}()},75:function(e,t,n){}},[[173,8,7]]]);
//# sourceMappingURL=main.b9d2a4ff.chunk.js.map