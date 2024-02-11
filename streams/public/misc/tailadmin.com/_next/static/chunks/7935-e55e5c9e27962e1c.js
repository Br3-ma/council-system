(self.webpackChunk_N_E=self.webpackChunk_N_E||[]).push([[7935],{6435:function(e,t,n){"use strict";n.d(t,{f:function(){return u}});var r=n(2265);let o=["light","dark"],a="(prefers-color-scheme: dark)",l="undefined"==typeof window,i=(0,r.createContext)(void 0),u=e=>(0,r.useContext)(i)?r.createElement(r.Fragment,null,e.children):r.createElement(c,e),s=["light","dark"],c=({forcedTheme:e,disableTransitionOnChange:t=!1,enableSystem:n=!0,enableColorScheme:l=!0,storageKey:u="theme",themes:c=s,defaultTheme:y=n?"system":"light",attribute:h="data-theme",value:g,children:v,nonce:b})=>{let[_,E]=(0,r.useState)(()=>f(u,y)),[S,w]=(0,r.useState)(()=>f(u)),I=g?Object.values(g):c,C=(0,r.useCallback)(e=>{let r=e;if(!r)return;"system"===e&&n&&(r=p());let a=g?g[r]:r,i=t?m():null,u=document.documentElement;if("class"===h?(u.classList.remove(...I),a&&u.classList.add(a)):a?u.setAttribute(h,a):u.removeAttribute(h),l){let e=o.includes(y)?y:null,t=o.includes(r)?r:e;u.style.colorScheme=t}null==i||i()},[]),O=(0,r.useCallback)(e=>{E(e);try{localStorage.setItem(u,e)}catch(e){}},[e]),L=(0,r.useCallback)(t=>{w(p(t)),"system"===_&&n&&!e&&C("system")},[_,e]);(0,r.useEffect)(()=>{let e=window.matchMedia(a);return e.addListener(L),L(e),()=>e.removeListener(L)},[L]),(0,r.useEffect)(()=>{let e=e=>{e.key===u&&O(e.newValue||y)};return window.addEventListener("storage",e),()=>window.removeEventListener("storage",e)},[O]),(0,r.useEffect)(()=>{C(null!=e?e:_)},[e,_]);let x=(0,r.useMemo)(()=>({theme:_,setTheme:O,forcedTheme:e,resolvedTheme:"system"===_?S:_,themes:n?[...c,"system"]:c,systemTheme:n?S:void 0}),[_,O,e,S,n,c]);return r.createElement(i.Provider,{value:x},r.createElement(d,{forcedTheme:e,disableTransitionOnChange:t,enableSystem:n,enableColorScheme:l,storageKey:u,themes:c,defaultTheme:y,attribute:h,value:g,children:v,attrs:I,nonce:b}),v)},d=(0,r.memo)(({forcedTheme:e,storageKey:t,attribute:n,enableSystem:l,enableColorScheme:i,defaultTheme:u,value:s,attrs:c,nonce:d})=>{let f="system"===u,m="class"===n?`var d=document.documentElement,c=d.classList;c.remove(${c.map(e=>`'${e}'`).join(",")});`:`var d=document.documentElement,n='${n}',s='setAttribute';`,p=i?o.includes(u)&&u?`if(e==='light'||e==='dark'||!e)d.style.colorScheme=e||'${u}'`:"if(e==='light'||e==='dark')d.style.colorScheme=e":"",y=(e,t=!1,r=!0)=>{let a=s?s[e]:e,l=t?e+"|| ''":`'${a}'`,u="";return i&&r&&!t&&o.includes(e)&&(u+=`d.style.colorScheme = '${e}';`),"class"===n?u+=t||a?`c.add(${l})`:"null":a&&(u+=`d[s](n,${l})`),u},h=e?`!function(){${m}${y(e)}}()`:l?`!function(){try{${m}var e=localStorage.getItem('${t}');if('system'===e||(!e&&${f})){var t='${a}',m=window.matchMedia(t);if(m.media!==t||m.matches){${y("dark")}}else{${y("light")}}}else if(e){${s?`var x=${JSON.stringify(s)};`:""}${y(s?"x[e]":"e",!0)}}${f?"":"else{"+y(u,!1,!1)+"}"}${p}}catch(e){}}()`:`!function(){try{${m}var e=localStorage.getItem('${t}');if(e){${s?`var x=${JSON.stringify(s)};`:""}${y(s?"x[e]":"e",!0)}}else{${y(u,!1,!1)};}${p}}catch(t){}}();`;return r.createElement("script",{nonce:d,dangerouslySetInnerHTML:{__html:h}})},()=>!0),f=(e,t)=>{let n;if(!l){try{n=localStorage.getItem(e)||void 0}catch(e){}return n||t}},m=()=>{let e=document.createElement("style");return e.appendChild(document.createTextNode("*{-webkit-transition:none!important;-moz-transition:none!important;-o-transition:none!important;-ms-transition:none!important;transition:none!important}")),document.head.appendChild(e),()=>{window.getComputedStyle(document.body),setTimeout(()=>{document.head.removeChild(e)},1)}},p=e=>(e||(e=window.matchMedia(a)),e.matches?"dark":"light")},13313:function(e,t){"use strict";let n;Object.defineProperty(t,"__esModule",{value:!0}),function(e,t){for(var n in t)Object.defineProperty(e,n,{enumerable:!0,get:t[n]})}(t,{DOMAttributeNames:function(){return r},isEqualNode:function(){return a},default:function(){return l}});let r={acceptCharset:"accept-charset",className:"class",htmlFor:"for",httpEquiv:"http-equiv",noModule:"noModule"};function o(e){let{type:t,props:n}=e,o=document.createElement(t);for(let e in n){if(!n.hasOwnProperty(e)||"children"===e||"dangerouslySetInnerHTML"===e||void 0===n[e])continue;let a=r[e]||e.toLowerCase();"script"===t&&("async"===a||"defer"===a||"noModule"===a)?o[a]=!!n[e]:o.setAttribute(a,n[e])}let{children:a,dangerouslySetInnerHTML:l}=n;return l?o.innerHTML=l.__html||"":a&&(o.textContent="string"==typeof a?a:Array.isArray(a)?a.join(""):""),o}function a(e,t){if(e instanceof HTMLElement&&t instanceof HTMLElement){let n=t.getAttribute("nonce");if(n&&!e.getAttribute("nonce")){let r=t.cloneNode(!0);return r.setAttribute("nonce",""),r.nonce=n,n===e.nonce&&e.isEqualNode(r)}}return e.isEqualNode(t)}function l(){return{mountedInstances:new Set,updateHead:e=>{let t={};e.forEach(e=>{if("link"===e.type&&e.props["data-optimized-fonts"]){if(document.querySelector('style[data-href="'+e.props["data-href"]+'"]'))return;e.props.href=e.props["data-href"],e.props["data-href"]=void 0}let n=t[e.type]||[];n.push(e),t[e.type]=n});let r=t.title?t.title[0]:null,o="";if(r){let{children:e}=r.props;o="string"==typeof e?e:Array.isArray(e)?e.join(""):""}o!==document.title&&(document.title=o),["meta","base","link","style","script"].forEach(e=>{n(e,t[e]||[])})}}}n=(e,t)=>{let n=document.getElementsByTagName("head")[0],r=n.querySelector("meta[name=next-head-count]"),l=Number(r.content),i=[];for(let t=0,n=r.previousElementSibling;t<l;t++,n=(null==n?void 0:n.previousElementSibling)||null){var u;(null==n?void 0:null==(u=n.tagName)?void 0:u.toLowerCase())===e&&i.push(n)}let s=t.map(o).filter(e=>{for(let t=0,n=i.length;t<n;t++)if(a(i[t],e))return i.splice(t,1),!1;return!0});i.forEach(e=>{var t;return null==(t=e.parentNode)?void 0:t.removeChild(e)}),s.forEach(e=>n.insertBefore(e,r)),r.content=(l-i.length+s.length).toString()},("function"==typeof t.default||"object"==typeof t.default&&null!==t.default)&&void 0===t.default.__esModule&&(Object.defineProperty(t.default,"__esModule",{value:!0}),Object.assign(t.default,t),e.exports=t.default)},85935:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),function(e,t){for(var n in t)Object.defineProperty(e,n,{enumerable:!0,get:t[n]})}(t,{handleClientScriptLoad:function(){return y},initScriptLoader:function(){return h},default:function(){return v}});let r=n(21024),o=n(68533),a=r._(n(54887)),l=o._(n(2265)),i=n(27484),u=n(13313),s=n(52185),c=new Map,d=new Set,f=["onLoad","onReady","dangerouslySetInnerHTML","children","onError","strategy","stylesheets"],m=e=>{if(a.default.preinit){e.forEach(e=>{a.default.preinit(e,{as:"style"})});return}{let t=document.head;e.forEach(e=>{let n=document.createElement("link");n.type="text/css",n.rel="stylesheet",n.href=e,t.appendChild(n)})}},p=e=>{let{src:t,id:n,onLoad:r=()=>{},onReady:o=null,dangerouslySetInnerHTML:a,children:l="",strategy:i="afterInteractive",onError:s,stylesheets:p}=e,y=n||t;if(y&&d.has(y))return;if(c.has(t)){d.add(y),c.get(t).then(r,s);return}let h=()=>{o&&o(),d.add(y)},g=document.createElement("script"),v=new Promise((e,t)=>{g.addEventListener("load",function(t){e(),r&&r.call(this,t),h()}),g.addEventListener("error",function(e){t(e)})}).catch(function(e){s&&s(e)});for(let[n,r]of(a?(g.innerHTML=a.__html||"",h()):l?(g.textContent="string"==typeof l?l:Array.isArray(l)?l.join(""):"",h()):t&&(g.src=t,c.set(t,v)),Object.entries(e))){if(void 0===r||f.includes(n))continue;let e=u.DOMAttributeNames[n]||n.toLowerCase();g.setAttribute(e,r)}"worker"===i&&g.setAttribute("type","text/partytown"),g.setAttribute("data-nscript",i),p&&m(p),document.body.appendChild(g)};function y(e){let{strategy:t="afterInteractive"}=e;"lazyOnload"===t?window.addEventListener("load",()=>{(0,s.requestIdleCallback)(()=>p(e))}):p(e)}function h(e){e.forEach(y),[...document.querySelectorAll('[data-nscript="beforeInteractive"]'),...document.querySelectorAll('[data-nscript="beforePageRender"]')].forEach(e=>{let t=e.id||e.getAttribute("src");d.add(t)})}function g(e){let{id:t,src:n="",onLoad:r=()=>{},onReady:o=null,strategy:u="afterInteractive",onError:c,stylesheets:f,...m}=e,{updateScripts:y,scripts:h,getIsSsr:g,appDir:v,nonce:b}=(0,l.useContext)(i.HeadManagerContext),_=(0,l.useRef)(!1);(0,l.useEffect)(()=>{let e=t||n;_.current||(o&&e&&d.has(e)&&o(),_.current=!0)},[o,t,n]);let E=(0,l.useRef)(!1);if((0,l.useEffect)(()=>{!E.current&&("afterInteractive"===u?p(e):"lazyOnload"===u&&("complete"===document.readyState?(0,s.requestIdleCallback)(()=>p(e)):window.addEventListener("load",()=>{(0,s.requestIdleCallback)(()=>p(e))})),E.current=!0)},[e,u]),("beforeInteractive"===u||"worker"===u)&&(y?(h[u]=(h[u]||[]).concat([{id:t,src:n,onLoad:r,onReady:o,onError:c,...m}]),y(h)):g&&g()?d.add(t||n):g&&!g()&&p(e)),v){if(f&&f.forEach(e=>{a.default.preinit(e,{as:"style"})}),"beforeInteractive"===u)return n?(a.default.preload(n,m.integrity?{as:"script",integrity:m.integrity}:{as:"script"}),l.default.createElement("script",{nonce:b,dangerouslySetInnerHTML:{__html:"(self.__next_s=self.__next_s||[]).push("+JSON.stringify([n])+")"}})):(m.dangerouslySetInnerHTML&&(m.children=m.dangerouslySetInnerHTML.__html,delete m.dangerouslySetInnerHTML),l.default.createElement("script",{nonce:b,dangerouslySetInnerHTML:{__html:"(self.__next_s=self.__next_s||[]).push("+JSON.stringify([0,{...m}])+")"}}));"afterInteractive"===u&&n&&a.default.preload(n,m.integrity?{as:"script",integrity:m.integrity}:{as:"script"})}return null}Object.defineProperty(g,"__nextScript",{value:!0});let v=g;("function"==typeof t.default||"object"==typeof t.default&&null!==t.default)&&void 0===t.default.__esModule&&(Object.defineProperty(t.default,"__esModule",{value:!0}),Object.assign(t.default,t),e.exports=t.default)},67447:function(e,t,n){"use strict";Object.defineProperty(t,"__esModule",{value:!0}),function(e,t){for(var n in t)Object.defineProperty(e,n,{enumerable:!0,get:t[n]})}(t,{unstable_getImgProps:function(){return u},default:function(){return s}});let r=n(21024),o=n(38630),a=n(76184),l=n(81749),i=r._(n(10536)),u=e=>{(0,a.warnOnce)("Warning: unstable_getImgProps() is experimental and may change or be removed at any time. Use at your own risk.");let{props:t}=(0,o.getImgProps)(e,{defaultLoader:i.default,imgConf:{deviceSizes:[640,750,828,1080,1200,1920,2048,3840],imageSizes:[16,32,48,64,96,128,256,384],path:"/_next/image",loader:"default",dangerouslyAllowSVG:!1,unoptimized:!1}});for(let[e,n]of Object.entries(t))void 0===n&&delete t[e];return{props:t}},s=l.Image},30622:function(e,t,n){"use strict";var r=n(2265),o=Symbol.for("react.element"),a=Symbol.for("react.fragment"),l=Object.prototype.hasOwnProperty,i=r.__SECRET_INTERNALS_DO_NOT_USE_OR_YOU_WILL_BE_FIRED.ReactCurrentOwner,u={key:!0,ref:!0,__self:!0,__source:!0};function s(e,t,n){var r,a={},s=null,c=null;for(r in void 0!==n&&(s=""+n),void 0!==t.key&&(s=""+t.key),void 0!==t.ref&&(c=t.ref),t)l.call(t,r)&&!u.hasOwnProperty(r)&&(a[r]=t[r]);if(e&&e.defaultProps)for(r in t=e.defaultProps)void 0===a[r]&&(a[r]=t[r]);return{$$typeof:o,type:e,key:s,ref:c,props:a,_owner:i.current}}t.Fragment=a,t.jsx=s,t.jsxs=s},57437:function(e,t,n){"use strict";e.exports=n(30622)},16691:function(e,t,n){e.exports=n(67447)},61396:function(e,t,n){e.exports=n(25250)},24033:function(e,t,n){e.exports=n(15313)},48475:function(e,t,n){e.exports=n(85935)},51872:function(e,t,n){"use strict";let r;n.d(t,{Z:function(){return i}});var o={randomUUID:"undefined"!=typeof crypto&&crypto.randomUUID&&crypto.randomUUID.bind(crypto)};let a=new Uint8Array(16),l=[];for(let e=0;e<256;++e)l.push((e+256).toString(16).slice(1));var i=function(e,t,n){if(o.randomUUID&&!t&&!e)return o.randomUUID();let i=(e=e||{}).random||(e.rng||function(){if(!r&&!(r="undefined"!=typeof crypto&&crypto.getRandomValues&&crypto.getRandomValues.bind(crypto)))throw Error("crypto.getRandomValues() not supported. See https://github.com/uuidjs/uuid#getrandomvalues-not-supported");return r(a)})();if(i[6]=15&i[6]|64,i[8]=63&i[8]|128,t){n=n||0;for(let e=0;e<16;++e)t[n+e]=i[e];return t}return function(e,t=0){return l[e[t+0]]+l[e[t+1]]+l[e[t+2]]+l[e[t+3]]+"-"+l[e[t+4]]+l[e[t+5]]+"-"+l[e[t+6]]+l[e[t+7]]+"-"+l[e[t+8]]+l[e[t+9]]+"-"+l[e[t+10]]+l[e[t+11]]+l[e[t+12]]+l[e[t+13]]+l[e[t+14]]+l[e[t+15]]}(i)}}}]);