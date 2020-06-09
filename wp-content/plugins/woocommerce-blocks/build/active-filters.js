this.wc=this.wc||{},this.wc.blocks=this.wc.blocks||{},this.wc.blocks["active-filters"]=function(e){function t(t){for(var r,i,u=t[0],a=t[1],l=t[2],b=0,f=[];b<u.length;b++)i=u[b],Object.prototype.hasOwnProperty.call(c,i)&&c[i]&&f.push(c[i][0]),c[i]=0;for(r in a)Object.prototype.hasOwnProperty.call(a,r)&&(e[r]=a[r]);for(s&&s(t);f.length;)f.shift()();return o.push.apply(o,l||[]),n()}function n(){for(var e,t=0;t<o.length;t++){for(var n=o[t],r=!0,u=1;u<n.length;u++){var a=n[u];0!==c[a]&&(r=!1)}r&&(o.splice(t--,1),e=i(i.s=n[0]))}return e}var r={},c={3:0},o=[];function i(t){if(r[t])return r[t].exports;var n=r[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.m=e,i.c=r,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)i.d(n,r,function(t){return e[t]}.bind(null,r));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="";var u=window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[],a=u.push.bind(u);u.push=t,u=u.slice();for(var l=0;l<u.length;l++)t(u[l]);var s=a;return o.push([646,2,1,0]),n()}({0:function(e,t){!function(){e.exports=this.wp.element}()},1:function(e,t){!function(){e.exports=this.wp.i18n}()},10:function(e,t){!function(){e.exports=this.React}()},102:function(e,t,n){"use strict";var r=n(0),c=(n(2),n(43)),o=n(6),i=n.n(o);n(137);t.a=function(e){var t=e.className,n=e.headingLevel,o=e.onChange,u=e.heading,a="h".concat(n);return Object(r.createElement)(a,null,Object(r.createElement)(c.PlainText,{className:i()("wc-block-component-title",t),value:u,onChange:o}))}},109:function(e,t,n){"use strict";n.d(t,"a",(function(){return u}));var r=n(35),c=n(34),o=n(0),i=n(38),u=function(e){var t=e.namespace,n=e.resourceName,u=e.resourceValues,a=void 0===u?[]:u,l=e.query,s=void 0===l?{}:l,b=e.shouldSelect,f=void 0===b||b;if(!t||!n)throw new Error("The options object must have valid values for the namespace and the resource properties.");var d=Object(o.useRef)({results:[],isLoading:!0}),g=Object(i.a)(s),v=Object(i.a)(a),p=Object(c.useSelect)((function(e){if(!f)return null;var c=e(r.COLLECTIONS_STORE_KEY),o=[t,n,g,v];return{results:c.getCollection.apply(c,o),isLoading:!c.hasFinishedResolution("getCollection",o)}}),[t,n,v,g,f]);return null!==p&&(d.current=p),d.current}},137:function(e,t,n){var r=n(138);"string"==typeof r&&(r=[[e.i,r,""]]);var c={insert:"head",singleton:!1};n(30)(r,c);r.locals&&(e.exports=r.locals)},138:function(e,t,n){},139:function(e,t,n){"use strict";n.d(t,"a",(function(){return o})),n.d(t,"b",(function(){return i}));var r=n(18),c=r.a.reduce((function(e,t){var n,r=(n=t)&&n.attribute_name?{id:parseInt(n.attribute_id,10),name:n.attribute_name,taxonomy:"pa_"+n.attribute_name,label:n.attribute_label}:null;return r.id&&e.push(r),e}),[]),o=function(e){if(e)return c.find((function(t){return t.id===e}))},i=function(e){if(e)return c.find((function(t){return t.taxonomy===e}))}},140:function(e,t,n){"use strict";n.d(t,"a",(function(){return c})),n.d(t,"b",(function(){return o}));var r=n(5),c=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:function(){},n=arguments.length>2?arguments[2]:void 0,c=arguments.length>3&&void 0!==arguments[3]?arguments[3]:"",o=e.filter((function(e){return e.attribute===n.taxonomy})),i=o.length?o[0]:null;if(i&&i.slug&&Array.isArray(i.slug)&&i.slug.includes(c)){var u=i.slug.filter((function(e){return e!==c})),a=e.filter((function(e){return e.attribute!==n.taxonomy}));u.length>0&&(i.slug=u.sort(),a.push(i)),t(Object(r.sortBy)(a,"attribute"))}},o=function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:[],t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:function(){},n=arguments.length>2?arguments[2]:void 0,c=arguments.length>3&&void 0!==arguments[3]?arguments[3]:[],o=arguments.length>4&&void 0!==arguments[4]?arguments[4]:"in",i=e.filter((function(e){return e.attribute!==n.taxonomy}));0===c.length?t(i):(i.push({attribute:n.taxonomy,operator:o,slug:Object(r.map)(c,"slug").sort()}),t(Object(r.sortBy)(i,"attribute")))}},18:function(e,t,n){"use strict";n.d(t,"e",(function(){return c})),n.d(t,"r",(function(){return o})),n.d(t,"k",(function(){return i})),n.d(t,"m",(function(){return u})),n.d(t,"b",(function(){return a})),n.d(t,"l",(function(){return l})),n.d(t,"o",(function(){return s})),n.d(t,"d",(function(){return b})),n.d(t,"n",(function(){return f})),n.d(t,"c",(function(){return d})),n.d(t,"p",(function(){return g})),n.d(t,"i",(function(){return v})),n.d(t,"j",(function(){return p})),n.d(t,"f",(function(){return h})),n.d(t,"g",(function(){return m})),n.d(t,"h",(function(){return O})),n.d(t,"q",(function(){return j})),n.d(t,"a",(function(){return _})),n.d(t,"s",(function(){return w}));var r=n(4),c=Object(r.getSetting)("enableReviewRating",!0),o=Object(r.getSetting)("showAvatars",!0),i=Object(r.getSetting)("max_columns",6),u=Object(r.getSetting)("min_columns",1),a=Object(r.getSetting)("default_columns",3),l=Object(r.getSetting)("max_rows",6),s=Object(r.getSetting)("min_rows",1),b=Object(r.getSetting)("default_rows",2),f=Object(r.getSetting)("min_height",500),d=Object(r.getSetting)("default_height",500),g=Object(r.getSetting)("placeholderImgSrc",""),v=(Object(r.getSetting)("thumbnail_size",300),Object(r.getSetting)("isLargeCatalog")),p=Object(r.getSetting)("limitTags"),h=Object(r.getSetting)("hasProducts",!0),m=Object(r.getSetting)("hasTags",!0),O=Object(r.getSetting)("homeUrl",""),j=Object(r.getSetting)("productCount",0),_=Object(r.getSetting)("attributes",[]),w=Object(r.getSetting)("wcBlocksAssetUrl","")},21:function(e,t){!function(){e.exports=this.wp.compose}()},23:function(e,t){!function(){e.exports=this.wp.blocks}()},3:function(e,t){!function(){e.exports=this.wp.components}()},34:function(e,t){!function(){e.exports=this.wp.data}()},35:function(e,t){!function(){e.exports=this.wc.wcBlocksData}()},38:function(e,t,n){"use strict";n.d(t,"a",(function(){return i}));var r=n(0),c=n(44),o=n.n(c),i=function(e){var t=Object(r.useRef)();return o()(e,t.current)||(t.current=e),t.current}},4:function(e,t){!function(){e.exports=this.wc.wcSettings}()},40:function(e,t){!function(){e.exports=this.wp.htmlEntities}()},43:function(e,t){!function(){e.exports=this.wp.blockEditor}()},44:function(e,t){!function(){e.exports=this.wp.isShallowEqual}()},48:function(e,t,n){"use strict";var r=n(11),c=n.n(r),o=n(13),i=n.n(o),u=n(17),a=n.n(u),l=n(14),s=n.n(l),b=n(15),f=n.n(b),d=n(12),g=n.n(d),v=n(16),p=n.n(v),h=n(0),m=n(5),O=n(6),j=n.n(O),_=n(3),w=n(21),y=(n(98),function(e){function t(){var e;return i()(this,t),(e=s()(this,f()(t).apply(this,arguments))).onClick=e.onClick.bind(g()(e)),e}return p()(t,e),a()(t,[{key:"onClick",value:function(e){this.props.onChange&&this.props.onChange(e.target.value)}},{key:"render",value:function(){var e,t=this,n=this.props,r=n.label,o=n.checked,i=n.instanceId,u=n.className,a=n.help,l=n.options,s=n.value,b="inspector-toggle-button-control-".concat(i);return a&&(e=Object(m.isFunction)(a)?a(o):a),Object(h.createElement)(_.BaseControl,{id:b,help:e,className:j()("components-toggle-button-control",u)},Object(h.createElement)("label",{id:b+"__label",htmlFor:b,className:"components-toggle-button-control__label"},r),Object(h.createElement)(_.ButtonGroup,{"aria-labelledby":b+"__label"},l.map((function(e,n){var o={};return s===e.value?(o.isPrimary=!0,o["aria-pressed"]=!0):(o.isDefault=!0,o["aria-pressed"]=!1),Object(h.createElement)(_.Button,c()({key:"".concat(e.label,"-").concat(e.value,"-").concat(n),value:e.value,onClick:t.onClick,"aria-label":r+": "+e.label},o),e.label)}))))}}]),t}(h.Component));t.a=Object(w.withInstanceId)(y)},5:function(e,t){!function(){e.exports=this.lodash}()},50:function(e,t,n){"use strict";n.d(t,"a",(function(){return o}));var r=n(0),c=Object(r.createContext)("page"),o=function(){return Object(r.useContext)(c)};c.Provider},646:function(e,t,n){"use strict";n.r(t);var r=n(11),c=n.n(r),o=n(0),i=n(1),u=n(23),a=n(26),l=n.n(a),s=n(6),b=n.n(s),f=n(43),d=n(3),g=n(84),v=n(102),p=n(25),h=n.n(p),m=n(91),O=(n(2),n(639),n(139)),j=n(89),_=function(e,t){return Number.isFinite(e)&&Number.isFinite(t)?Object(i.sprintf)(Object(i.__)("Between %s and %s","woo-gutenberg-products-block"),Object(j.a)(e),Object(j.a)(t)):Number.isFinite(e)?Object(i.sprintf)(Object(i.__)("From %s","woo-gutenberg-products-block"),Object(j.a)(e)):Object(i.sprintf)(Object(i.__)("Up to %s","woo-gutenberg-products-block"),Object(j.a)(t))},w=function(e,t){var n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:function(){};return Object(o.createElement)("li",{className:"wc-block-active-filters-list-item",key:e+":"+t},Object(o.createElement)("span",{className:"wc-block-active-filters-list-item__type"},e+": "),Object(o.createElement)("strong",{className:"wc-block-active-filters-list-item__name"},t),Object(o.createElement)("button",{onClick:n},Object(i.__)("Remove","woo-gutenberg-products-block")))},y=n(109),k=n(40),E=n(140),S=function(e){var t=e.attributeObject,n=void 0===t?{}:t,r=e.slugs,c=void 0===r?[]:r,o=Object(y.a)({namespace:"/wc/store",resourceName:"products/attributes/terms",resourceValues:[n.id]}),i=o.results,u=o.isLoading,a=Object(m.b)("attributes",[]),l=h()(a,2),s=l[0],b=l[1];if(u)return null;var f=n.label;return c.map((function(e){var t=i.find((function(t){return t.slug===e}));return t&&w(f,Object(k.decodeEntities)(t.name||e),(function(){Object(E.a)(s,b,n,e)}))}))},C=function(e){var t=e.attributes,n=e.isEditor,r=void 0!==n&&n,c=Object(m.b)("attributes",[]),u=h()(c,2),a=u[0],l=u[1],s=Object(m.b)("min_price"),f=h()(s,2),d=f[0],g=f[1],v=Object(m.b)("max_price"),p=h()(v,2),j=p[0],y=p[1],k=Object(o.useMemo)((function(){return Number.isFinite(d)||Number.isFinite(j)?w(Object(i.__)("Price","woo-gutenberg-products-block"),_(d,j),(function(){g(null),y(null)})):null}),[d,j,_]),E=Object(o.useMemo)((function(){return a.map((function(e){var t=Object(O.b)(e.attribute);return Object(o.createElement)(S,{attributeObject:t,slugs:e.slug,key:e.attribute})}))}),[a]);if(!(a.length>0||Number.isFinite(d)||Number.isFinite(j)||r))return null;var C="h".concat(t.headingLevel),x=b()("wc-block-active-filters-list",{"wc-block-active-filters-list--chips":"chips"===t.displayStyle});return Object(o.createElement)(o.Fragment,null,!r&&t.heading&&Object(o.createElement)(C,null,t.heading),Object(o.createElement)("div",{className:"wc-block-active-filters"},Object(o.createElement)("ul",{className:x},r?Object(o.createElement)(o.Fragment,null,w(Object(i.__)("Size","woo-gutenberg-products-block"),Object(i.__)("Small","woo-gutenberg-products-block")),w(Object(i.__)("Color","woo-gutenberg-products-block"),Object(i.__)("Blue","woo-gutenberg-products-block"))):Object(o.createElement)(o.Fragment,null,k,E)),Object(o.createElement)("button",{className:"wc-block-active-filters__clear-all",onClick:function(){g(null),y(null),l([])}},Object(i.__)("Clear All","woo-gutenberg-products-block"))))},x=n(48),N=Object(d.withSpokenMessages)((function(e){var t=e.attributes,n=e.setAttributes,r=t.className,c=t.displayStyle,u=t.heading,a=t.headingLevel;return Object(o.createElement)("div",{className:r},Object(o.createElement)(f.InspectorControls,{key:"inspector"},Object(o.createElement)(d.PanelBody,{title:Object(i.__)("Block Settings","woo-gutenberg-products-block")},Object(o.createElement)(x.a,{label:Object(i.__)("Display Style","woo-gutenberg-products-block"),value:c,options:[{label:Object(i.__)("List","woo-gutenberg-products-block"),value:"list"},{label:Object(i.__)("Chips","woo-gutenberg-products-block"),value:"chips"}],onChange:function(e){return n({displayStyle:e})}}),Object(o.createElement)("p",null,Object(i.__)("Heading Level","woo-gutenberg-products-block")),Object(o.createElement)(g.a,{isCollapsed:!1,minLevel:2,maxLevel:7,selectedLevel:a,onChange:function(e){return n({headingLevel:e})}}))),Object(o.createElement)(v.a,{headingLevel:a,heading:u,onChange:function(e){return n({heading:e})}}),Object(o.createElement)(d.Disabled,null,Object(o.createElement)(C,{attributes:t,isEditor:!0})))}));Object(u.registerBlockType)("woocommerce/active-filters",{title:Object(i.__)("Active Product Filters","woo-gutenberg-products-block"),icon:{src:Object(o.createElement)(l.a,{icon:"list-checkmark"}),foreground:"#96588a"},category:"woocommerce",keywords:[Object(i.__)("WooCommerce","woo-gutenberg-products-block")],description:Object(i.__)("Display a list of active product filters.","woo-gutenberg-products-block"),supports:{multiple:!1},example:{attributes:{}},attributes:{displayStyle:{type:"string",default:"list"},heading:{type:"string",default:Object(i.__)("Active filters","woo-gutenberg-products-block")},headingLevel:{type:"number",default:3}},edit:N,save:function(e){var t=e.attributes,n=t.className,r={"data-display-style":t.displayStyle,"data-heading":t.heading,"data-heading-level":t.headingLevel};return Object(o.createElement)("div",c()({className:b()("is-loading",n)},r),Object(o.createElement)("span",{"aria-hidden":!0,className:"wc-block-active-product-filters__placeholder"}))}})},84:function(e,t,n){"use strict";var r=n(13),c=n.n(r),o=n(17),i=n.n(o),u=n(14),a=n.n(u),l=n(15),s=n.n(l),b=n(16),f=n.n(b),d=n(0),g=n(5),v=n(1),p=n(3);function h(e){var t=e.level,n={1:"M9 5h2v10H9v-4H5v4H3V5h2v4h4V5zm6.6 0c-.6.9-1.5 1.7-2.6 2v1h2v7h2V5h-1.4z",2:"M7 5h2v10H7v-4H3v4H1V5h2v4h4V5zm8 8c.5-.4.6-.6 1.1-1.1.4-.4.8-.8 1.2-1.3.3-.4.6-.8.9-1.3.2-.4.3-.8.3-1.3 0-.4-.1-.9-.3-1.3-.2-.4-.4-.7-.8-1-.3-.3-.7-.5-1.2-.6-.5-.2-1-.2-1.5-.2-.4 0-.7 0-1.1.1-.3.1-.7.2-1 .3-.3.1-.6.3-.9.5-.3.2-.6.4-.8.7l1.2 1.2c.3-.3.6-.5 1-.7.4-.2.7-.3 1.2-.3s.9.1 1.3.4c.3.3.5.7.5 1.1 0 .4-.1.8-.4 1.1-.3.5-.6.9-1 1.2-.4.4-1 .9-1.6 1.4-.6.5-1.4 1.1-2.2 1.6V15h8v-2H15z",3:"M12.1 12.2c.4.3.8.5 1.2.7.4.2.9.3 1.4.3.5 0 1-.1 1.4-.3.3-.1.5-.5.5-.8 0-.2 0-.4-.1-.6-.1-.2-.3-.3-.5-.4-.3-.1-.7-.2-1-.3-.5-.1-1-.1-1.5-.1V9.1c.7.1 1.5-.1 2.2-.4.4-.2.6-.5.6-.9 0-.3-.1-.6-.4-.8-.3-.2-.7-.3-1.1-.3-.4 0-.8.1-1.1.3-.4.2-.7.4-1.1.6l-1.2-1.4c.5-.4 1.1-.7 1.6-.9.5-.2 1.2-.3 1.8-.3.5 0 1 .1 1.6.2.4.1.8.3 1.2.5.3.2.6.5.8.8.2.3.3.7.3 1.1 0 .5-.2.9-.5 1.3-.4.4-.9.7-1.5.9v.1c.6.1 1.2.4 1.6.8.4.4.7.9.7 1.5 0 .4-.1.8-.3 1.2-.2.4-.5.7-.9.9-.4.3-.9.4-1.3.5-.5.1-1 .2-1.6.2-.8 0-1.6-.1-2.3-.4-.6-.2-1.1-.6-1.6-1l1.1-1.4zM7 9H3V5H1v10h2v-4h4v4h2V5H7v4z",4:"M9 15H7v-4H3v4H1V5h2v4h4V5h2v10zm10-2h-1v2h-2v-2h-5v-2l4-6h3v6h1v2zm-3-2V7l-2.8 4H16z",5:"M12.1 12.2c.4.3.7.5 1.1.7.4.2.9.3 1.3.3.5 0 1-.1 1.4-.4.4-.3.6-.7.6-1.1 0-.4-.2-.9-.6-1.1-.4-.3-.9-.4-1.4-.4H14c-.1 0-.3 0-.4.1l-.4.1-.5.2-1-.6.3-5h6.4v1.9h-4.3L14 8.8c.2-.1.5-.1.7-.2.2 0 .5-.1.7-.1.5 0 .9.1 1.4.2.4.1.8.3 1.1.6.3.2.6.6.8.9.2.4.3.9.3 1.4 0 .5-.1 1-.3 1.4-.2.4-.5.8-.9 1.1-.4.3-.8.5-1.3.7-.5.2-1 .3-1.5.3-.8 0-1.6-.1-2.3-.4-.6-.2-1.1-.6-1.6-1-.1-.1 1-1.5 1-1.5zM9 15H7v-4H3v4H1V5h2v4h4V5h2v10z",6:"M9 15H7v-4H3v4H1V5h2v4h4V5h2v10zm8.6-7.5c-.2-.2-.5-.4-.8-.5-.6-.2-1.3-.2-1.9 0-.3.1-.6.3-.8.5l-.6.9c-.2.5-.2.9-.2 1.4.4-.3.8-.6 1.2-.8.4-.2.8-.3 1.3-.3.4 0 .8 0 1.2.2.4.1.7.3 1 .6.3.3.5.6.7.9.2.4.3.8.3 1.3s-.1.9-.3 1.4c-.2.4-.5.7-.8 1-.4.3-.8.5-1.2.6-1 .3-2 .3-3 0-.5-.2-1-.5-1.4-.9-.4-.4-.8-.9-1-1.5-.2-.6-.3-1.3-.3-2.1s.1-1.6.4-2.3c.2-.6.6-1.2 1-1.6.4-.4.9-.7 1.4-.9.6-.3 1.1-.4 1.7-.4.7 0 1.4.1 2 .3.5.2 1 .5 1.4.8 0 .1-1.3 1.4-1.3 1.4zm-2.4 5.8c.2 0 .4 0 .6-.1.2 0 .4-.1.5-.2.1-.1.3-.3.4-.5.1-.2.1-.5.1-.7 0-.4-.1-.8-.4-1.1-.3-.2-.7-.3-1.1-.3-.3 0-.7.1-1 .2-.4.2-.7.4-1 .7 0 .3.1.7.3 1 .1.2.3.4.4.6.2.1.3.3.5.3.2.1.5.2.7.1z"};return n.hasOwnProperty(t)?Object(d.createElement)(p.SVG,{width:"20",height:"20",viewBox:"0 0 20 20",xmlns:"http://www.w3.org/2000/svg"},Object(d.createElement)(p.Path,{d:n[t]})):null}var m=function(e){function t(){return c()(this,t),a()(this,s()(t).apply(this,arguments))}return f()(t,e),i()(t,[{key:"createLevelControl",value:function(e,t,n){var r=e===t;return{icon:Object(d.createElement)(h,{level:e}),title:Object(v.sprintf)(Object(v.__)("Heading %d"),e),isActive:r,onClick:function(){return n(e)}}}},{key:"render",value:function(){var e=this,t=this.props,n=t.isCollapsed,r=void 0===n||n,c=t.minLevel,o=t.maxLevel,i=t.selectedLevel,u=t.onChange;return Object(d.createElement)(p.Toolbar,{isCollapsed:r,icon:Object(d.createElement)(h,{level:i}),controls:Object(g.range)(c,o).map((function(t){return e.createLevelControl(t,i,u)}))})}}]),t}(d.Component);t.a=m},89:function(e,t,n){"use strict";n.d(t,"a",(function(){return o}));var r=n(1),c=n(4),o=function(e){var t=arguments.length>1&&void 0!==arguments[1]?arguments[1]:c.CURRENCY.priceFormat,n=arguments.length>2&&void 0!==arguments[2]?arguments[2]:c.CURRENCY.symbol,o=parseInt(e,10);if(!isFinite(o))return"";var i=Object(r.sprintf)(t,n,o),u=document.createElement("textarea");return u.innerHTML=i,u.value}},91:function(e,t,n){"use strict";n.d(t,"a",(function(){return b})),n.d(t,"b",(function(){return f})),n.d(t,"c",(function(){return d}));var r=n(25),c=n.n(r),o=n(35),i=n(34),u=n(0),a=n(50),l=n(5),s=n(38),b=function(e){var t=Object(a.a)();e=e||t;var n=Object(i.useSelect)((function(t){return t(o.QUERY_STATE_STORE_KEY).getValueForQueryContext(e,void 0)}),[e]),r=Object(i.useDispatch)(o.QUERY_STATE_STORE_KEY).setValueForQueryContext;return[n,Object(u.useCallback)((function(t){r(e,t)}),[e])]},f=function(e,t,n){var r=Object(a.a)();n=n||r;var c=Object(i.useSelect)((function(r){return r(o.QUERY_STATE_STORE_KEY).getValueForQueryKey(n,e,t)}),[n,e]),l=Object(i.useDispatch)(o.QUERY_STATE_STORE_KEY).setQueryValue;return[c,Object(u.useCallback)((function(t){l(n,e,t)}),[n,e])]},d=function(e,t){var n=Object(a.a)(),r=b(t=t||n),o=c()(r,2),i=o[0],f=o[1],d=Object(s.a)(e),g=Object(u.useRef)(!1);return Object(u.useEffect)((function(){f(Object(l.assign)({},i,d)),g.current=!0}),[d]),g.current?[i,f]:[e,f]}}});