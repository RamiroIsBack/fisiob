(window.webpackJsonp=window.webpackJsonp||[]).push([[2],{412:function(e,t,n){},415:function(e,t,n){},423:function(e,t,n){"use strict";n.r(t);var a=n(4),i=n(5),o=n(8),c=n(6),r=n(7),l=n(1),s=n.n(l),p=n(19),m=n(28),u=n(46),d=n.n(u),f=n(26),v=(n(415),n(22)),h=function(e){function t(){var e;return Object(a.a)(this,t),(e=Object(o.a)(this,Object(c.a)(t).call(this))).state={flipEffect:{},fliped:!1},e.handleClick=e.handleClick.bind(Object(v.a)(Object(v.a)(e))),e.flipIt=e.flipIt.bind(Object(v.a)(Object(v.a)(e))),e}return Object(r.a)(t,e),Object(i.a)(t,[{key:"handleClick",value:function(e){console.log(e.currentTarget.id),this.props.servicioSectionClicked(e.target.id)}},{key:"flipIt",value:function(){this.state.fliped?this.setState({flipEffect:{transform:"rotateY(0deg)"},fliped:!1}):this.setState({flipEffect:{transform:"rotateY(180deg)"},fliped:!0})}},{key:"getTecnicas",value:function(){var e=this;return s.a.createElement("div",{className:"row"},s.a.createElement("div",{className:"col-sm-12",style:{textAlign:"center",borderTop:"1px solid black"}},"tecnicas:"),this.props.person.tecnicas.map(function(t,n){return s.a.createElement("div",{className:"equipo__member__button",onClick:e.handleClick,key:n,id:t.servicio,style:{paddingRight:2,paddingLeft:2,display:"inline-block",margin:"2px"}},t.nombre)}))}},{key:"getFlipButton",value:function(){return s.a.createElement("div",{className:"equipo__member__button",onClick:this.flipIt,style:{backgroundColor:"black",right:-10,bottom:6,zIndex:100,position:"absolute"}},this.state.fliped?"Foto":"Estudios")}},{key:"render",value:function(){var e=this.getTecnicas(),t=this.getFlipButton();return s.a.createElement("div",null,s.a.createElement("div",{className:"flip-container"},s.a.createElement("div",{className:"flipper",style:this.state.flipEffect},s.a.createElement("div",{className:"front"},s.a.createElement("img",{style:{maxWidth:280,maxHeight:380},src:this.props.person.urlPic,alt:this.props.person.nombre}),t),s.a.createElement("div",{className:"back"},s.a.createElement("div",{className:"container-fluid"},s.a.createElement("div",{className:"row",id:"header"},s.a.createElement("div",{className:"col-sm-8"},s.a.createElement("h4",{style:{marginBottom:3}},this.props.person.nombre),s.a.createElement("p",{style:{marginTop:0,marginBottom:3}},this.props.person.cargo)),s.a.createElement("div",{style:{position:"absolute",right:10}},s.a.createElement("img",{style:{maxWidth:50,maxHeight:70},src:this.props.person.urlPic,alt:this.props.person.nombre})),t),s.a.createElement("div",{style:{width:"60%",textAlign:"center",borderTop:"1px solid black"}},"estudios:"),this.props.person.formacion.map(function(e,t){return s.a.createElement("div",{key:t,className:"row",id:"estudio".concat(t)},s.a.createElement("div",{className:"col-sm-5",style:{width:"auto"}},s.a.createElement("p",{style:{margin:"0 0 1 0"}},e.estudios)),s.a.createElement("div",{className:"col-sm-5",style:{cursor:"pointer",width:"auto"}},s.a.createElement("img",{onClick:function(){window.open(e.centroUrl,"blank")},src:e.centroUrlPic,width:"60",alt:""})),s.a.createElement("div",{className:"col-sm-2",style:{width:"auto"}},s.a.createElement("p",{style:{margin:"0 0 1 0"}},e.fecha)))}),e)))))}}]),t}(l.Component),b=function(e){function t(){var e,n;Object(a.a)(this,t);for(var i=arguments.length,r=new Array(i),l=0;l<i;l++)r[l]=arguments[l];return(n=Object(o.a)(this,(e=Object(c.a)(t)).call.apply(e,[this].concat(r)))).servicioSectionClicked=function(e){if("servicios"===e)n.props.moveToSection("");else if("equipo"===e)f.a.push("/equipo"),n.props.moveToSection("");else if("instalaciones"===e)f.a.push("/instalaciones"),n.props.moveToSection("");else{f.a.push("/servicios");var t=e;setTimeout(function(){n.props.moveToSection(t.toLowerCase())},400)}},n}return Object(r.a)(t,e),Object(i.a)(t,[{key:"componentDidMount",value:function(){var e=this;d()({method:"get",url:"".concat("https://stormy-meadow-66204.herokuapp.com","/copy/equipo")}).then(function(t){e.props.equipoReceived(t.data.equipoCopy[0])}).catch(function(e){console.log(e)})}},{key:"render",value:function(){var e=this;return this.props.copy.equipoCopy?s.a.createElement("div",null,s.a.createElement("div",{className:"deck__container"},this.props.copy.equipoCopy.equipo.map(function(t,n){return s.a.createElement("div",{key:n,className:"card__supercontainer"},s.a.createElement("div",{className:"card__container"},s.a.createElement(h,{person:t,servicioSectionClicked:e.servicioSectionClicked})),s.a.createElement("div",{key:n,className:"card__side",style:{width:"90%"}},s.a.createElement("p",{style:{fontWeight:"bold"}},t.nombre," ",t.apellido),s.a.createElement("p",null,t.textoPersona)))})),s.a.createElement("div",{className:"container",style:{marginTop:40}},this.props.copy.equipoCopy.equipoTextoLargo.split("\n").map(function(e,t){return s.a.createElement("span",{key:t},e,s.a.createElement("br",null))}))):s.a.createElement("div",null," Cargando...")}}]),t}(l.Component),y=Object(p.b)(function(e){var t=e.copy;return{navigation:e.navigation,copy:t}},function(e){return{moveToSection:function(t){return e(m.a.moveToSection(t))},equipoReceived:function(t){return e(m.a.equipoReceived(t))}}})(b),g=(n(412),function(e){function t(){var e,n;Object(a.a)(this,t);for(var i=arguments.length,r=new Array(i),l=0;l<i;l++)r[l]=arguments[l];return(n=Object(o.a)(this,(e=Object(c.a)(t)).call.apply(e,[this].concat(r)))).closeMenuIfNeeded=function(){n.props.navigation.mobileTopMenu&&n.props.toggleMobileTopMenu(!1)},n}return Object(r.a)(t,e),Object(i.a)(t,[{key:"render",value:function(){var e=this.props.navigation.mobileTopMenu?{animationName:"moveDownSlowly"}:{animationDelay:"0.5s",animationName:"moveUpSlowly"};return s.a.createElement("div",{className:"layout__container",onClick:this.closeMenuIfNeeded,style:e},s.a.createElement(y,null))}}]),t}(l.Component));t.default=Object(p.b)(function(e){return{navigation:e.navigation}},function(e){return{toggleMobileTopMenu:function(t){return e(m.a.toggleMobileTopMenu(t))}}})(g)}}]);
//# sourceMappingURL=2.e00203f3.chunk.js.map