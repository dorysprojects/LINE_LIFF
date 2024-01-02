    /*
     * \init.php
     * \index.php
     * \LineCrontab.php
     * \config\LineFakeWebhook.php
     * \library\core\func\kPrewPic.php
     * 
     * \library\plugin\analytics\src\analyze.js
     * \library\plugin\flex\main.js
     */
const language = {
    'en' :{
        "must be specified" : "must be specified",
        "invalid property" : "invalid property",
        "must be greater than or equal to 0" : "must be greater than or equal to 0",
        "lower limit exceeded" : "lower limit exceeded",
        "must be the fist or last element of the box" : "must be the fist or last element of the box",
        "invalid uri scheme" : "invalid uri scheme",
        "too big height" : "too big height",
        "aspect ratio must be in the range (0 < (h/w) <= 3)" : "aspect ratio must be in the range (0 < (h/w) <= 3)",
        "invalid unit" : "invalid unit",
        "invalid datetime format for the specified mode" : "invalid datetime format for the specified mode",
        "invalid date time order" : "invalid date time order",
        "At least one block must be specified" : "At least one block must be specified",
        "json parsing error" : "json parsing error",
        "embedding videos in messages is not allowed" : "embedding videos in messages is not allowed",

        "Video is not shown in simulator. Instead, you'll see alternative content (altContent)" : "Video is not shown in simulator. Instead, you'll see alternative content (altContent)",
        "You can configure altContent by adding/removing the child node of the video" : "You can configure altContent by adding/removing the child node of the video",
        "Spacer is no longer supported and will be removed in a future version." : "Spacer is no longer supported and will be removed in a future version.",
        "Scan this QR code in your LINE app." : "Scan this QR code in your LINE app.",
        "Click the button below to generate a test QRcode." : "Click the button below to generate a test QRcode.",

        "title" : "FLEX MESSAGE SIMULATOR",
        "cancel" : "Cancel",
        "create" : "Create",
        "copy" : "Copy",
        "copied" : "Copied",
        "apply" : "Apply",
        "close" : "Close",
        "json_spec" : "JSON spec",
        "back_to_home" : "HOME",
        "json" : "View as JSON",
        "example" : "Showcase",
        "Test" : "Test",
        "Test Message" : "Test Message",
        "Generate QRcode" : "Generate QRcode",
        "seconds" : "seconds",
        "addBtn" : "New",
        
        "orText" : "or",
        "keywords" : "keywords",

        "type" : "type",
        "flex" : "flex",
        "margin" : "margin",
        "lineSpacing" : "lineSpacing",
        "size" : "size",
        "color" : "color",
        "backgroundColor" : "backgroundColor",
        "position" : "position",
        "url" : "url",
        "align" : "align",
        "gravity" : "gravity",

        "Box" : "Box",
        "layout" : "layout",
        "spacing" : "spacing", 
        "width" : "width",
        "height" : "height",
        "maxWidth" : "maxWidth",
        "maxHeight" : "maxHeight",
        "borderWidth" : "borderWidth",
        "borderColor" : "borderColor",
        "cornerRadius" : "cornerRadius",
        "justifyContent" : "justifyContent",
        "alignItems" : "alignItems",

        "Span" : "Span",
        "Text" : "Text",
        "text" : "text",
        "weight" : "weight",
        "style" : "style",
        "decoration" : "decoration",
        "wrap" : "wrap",
        "maxLines" : "maxLines",
        "maxLines_memo" : "`maxLines` is not supported in simulator",
        "adjustMode" : "adjustMode",
        "adjustMode_memo" : "`adjustMode` is not supported in simulator",

        "Video" : "Video",
        "Image" : "Image",
        "aspectRatio" : "aspectRatio",
        "aspectMode" : "aspectMode",
        "animated" : "animated",

        "Icon" : "Icon",

        "Separator" : "Separator",

        "Filler" : "Filler",

        "Spacer" : "Spacer",

        "Offset" : "Offset",
        "offsetTop" : "offsetTop",
        "offsetBottom" : "offsetBottom",
        "offsetStart" : "offsetStart",
        "offsetEnd" : "offsetEnd",

        "Padding" : "Padding",
        "paddingAll" : "paddingAll",
        "paddingTop" : "paddingTop",
        "paddingBottom" : "paddingBottom",
        "paddingStart" : "paddingStart",
        "paddingEnd" : "paddingEnd",

        "Background" : "Background",
        "angle" : "angle",
        "startColor" : "startColor",
        "endColor" : "endColor",
        "centerColor" : "centerColor",
        "centerPosition" : "centerPosition",

        "Button" : "Button",

        "Bubble" : "Bubble",
        "direction" : "direction",

        "Carousel" : "Carousel",

        "Action" : "Action",
        "label" : "label",
        "data" : "data",
        "displayText" : "displayText",
        "uri" : "uri",
        "altUri" : "altUri",
        "desktop" : "desktop",
        "mode" : "mode",
        "initial" : "initial",
        "max" : "max",
        "min" : "min",

        "Style" : "Style",
        "separator" : "separator",
        "separatorColor" : "separatorColor",

        "bubble" : "bubble",
        "carousel" : "carousel",
        "box" : "box",
        "video" : "video",
        "image" : "image",
        "icon" : "icon",
        "span" : "span",
        "button" : "button",
        "filler" : "filler",
        "spacer" : "spacer",

        "header" : "header",
        "hero" : "hero",
        "body" : "body",
        "footer" : "footer",
        
        "contents" : "contents",
    },
    'zh-TW' : {
        "must be specified" : "必需填寫",
        "invalid property" : "格式有誤",
        "must be greater than or equal to 0" : "需大於或等於0",
        "lower limit exceeded" : "低於下限值",
        "must be the fist or last element of the box" : "必需在頭或尾",
        "invalid uri scheme" : "連結格式有誤",
        "too big height" : "大於上限值",
        "aspect ratio must be in the range (0 < (h/w) <= 3)" : "長寬必需介於0到3",
        "invalid unit" : "單位有誤",
        "invalid datetime format for the specified mode" : "日期時間格式模式有誤",
        "invalid date time order" : "日期時間順序有誤",
        "At least one block must be specified" : "必需至少一個內容",
        "json parsing error" : "JSON 解析錯誤",
        "embedding videos in messages is not allowed" : "輪播容器不允許崁入影片",

        "Video is not shown in simulator. Instead, you'll see alternative content (altContent)" : "影片未在模擬器顯示，而您會看到替代的圖片",
        "You can configure altContent by adding/removing the child node of the video" : "您可以透過新增/刪除影片的子節點來變更替代的圖片",
        "Spacer is no longer supported and will be removed in a future version." : "不再支持 Spacer 並將在未來的版本中刪除。",
        "Scan this QR code in your LINE app." : "在您的 LINE APP中掃描此QRcode。",
        "Click the button below to generate a test QRcode." : "點擊下方按鈕產生測試QRcode。",

        "title" : "FLEX訊息模擬器",
        "cancel" : "取消",
        "create" : "建立",
        "copy" : "複製",
        "copied" : "已複製",
        "apply" : "使用",
        "close" : "關閉",
        "json_spec" : "JSON 說明",
        "back_to_home" : "回主頁",
        "json" : "JSON",
        "example" : "範例",
        "Test" : "測試",
        "Test Message" : "測試訊息",
        "Generate QRcode" : "產生QRcode",
        "seconds" : "秒",
        "addBtn" : "新增",
        
        "orText" : "或",
        "keywords" : "關鍵字",

        "type" : "類型",
        "flex" : "flex",//柔性
        "margin" : "邊界",
        "lineSpacing" : "行間距",
        "size" : "尺寸",
        "color" : "顏色",
        "backgroundColor" : "背景顏色",
        "position" : "位置",
        "url" : "網址",
        "align" : "水平對齊",
        "gravity" : "垂直對齊",

        "Box" : "容器",
        "layout" : "佈局",
        "spacing" : "間距",
        "width" : "寬度",
        "height" : "高度",
        "maxWidth" : "最大寬度",
        "maxHeight" : "最大高度",
        "borderWidth" : "邊框寬度",
        "borderColor" : "邊框顏色",
        "cornerRadius" : "邊角半徑",
        "justifyContent" : "justifyContent",//內容對齊
        "alignItems" : "alignItems",//內容對齊

        "Span" : "內文字",
        "Text" : "文字",
        "text" : "文字",
        "weight" : "粗細",
        "style" : "樣式",
        "decoration" : "裝飾",
        "wrap" : "斷行",
        "maxLines" : "最大行數",
        "maxLines_memo" : "此模擬器不支援 `最大行數`",
        "adjustMode" : "調整模式",
        "adjustMode_memo" : "此模擬器不支援 `調整模式`",

        "Video" : "影片",
        "Image" : "圖片",
        "aspectRatio" : "長寬比",
        "aspectMode" : "局面模式",
        "animated" : "動畫",

        "Icon" : "圖標",

        "Separator" : "分隔線",

        "Filler" : "填充物件",

        "Spacer" : "間距物件",

        "Offset" : "偏移",
        "offsetTop" : "頂部偏移",
        "offsetBottom" : "底部偏移",
        "offsetStart" : "左側偏移",
        "offsetEnd" : "右側偏移",

        "Padding" : "填充",
        "paddingAll" : "全部填充",
        "paddingTop" : "頂部填充",
        "paddingBottom" : "底部填充",
        "paddingStart" : "左側填充",
        "paddingEnd" : "右側填充",

        "Background" : "背景",
        "angle" : "角度",
        "startColor" : "開始顏色",
        "endColor" : "結束顏色",
        "centerColor" : "中心色",
        "centerPosition" : "中心位置",

        "Button" : "按鈕",

        "Bubble" : "泡泡容器",
        "direction" : "方向",

        "Carousel" : "輪播容器",

        "Action" : "動作",
        "label" : "標籤內容",
        "data" : "數據",
        "displayText" : "顯示文字",
        "uri" : "網址",
        "altUri" : " ",
        "desktop" : "電腦版網址",
        "mode" : "模式",
        "initial" : "初始",
        "max" : "最大",
        "min" : "最小",

        "Style" : "樣式",
        "separator" : "分隔線",
        "separatorColor" : "分隔線顏色",

        "bubble" : "泡泡容器",
        "carousel" : "輪播容器",
        "box" : "容器",
        "video" : "影片",
        "image" : "圖片",
        "icon" : "圖標",
        "span" : "內文字",
        "button" : "按鈕",
        "filler" : "填充物件",
        "spacer" : "間距物件",

        "header" : "內容標頭",
        "hero" : "內容標題",
        "body" : "內容主體",
        "footer" : "內容頁腳",
        
        "contents" : "內容",
    }
};
function array_flip(trans=null) {
    var key, tmp_ar = {};
    if(trans){
        for (key in trans) {
            if (trans.hasOwnProperty(key)) {
                tmp_ar[trans[key]] = key;
            }
        }
    }
    
    return tmp_ar;
}
function translate(val=null, flip=false){
    var LanguageSelect = language[document.querySelector('.language-selector select').value];
    if(LanguageSelect && flip){
        LanguageSelect = array_flip(LanguageSelect);
    }
    
    return (LanguageSelect&&LanguageSelect[val]) ? LanguageSelect[val] : val;
}
function translateMsg(Msg=null){
    var LanguageSelect = language[document.querySelector('.language-selector select').value];
    for (const [key, val] of Object.entries(LanguageSelect)) {
        Msg = Msg.split(key).join(val);
    }
    
    return Msg;
}

!function(e) {
    function t(t) {
        for (var n, i, a = t[0], d = t[1], l = t[2], u = 0, p = []; u < a.length; u++)
            i = a[u],
            Object.prototype.hasOwnProperty.call(s, i) && s[i] && p.push(s[i][0]),
            s[i] = 0;
        for (n in d)
            Object.prototype.hasOwnProperty.call(d, n) && (e[n] = d[n]);
        for (c && c(t); p.length; )
            p.shift()();
        return r.push.apply(r, l || []),
        o()
    }
    function o() {
        for (var e, t = 0; t < r.length; t++) {
            for (var o = r[t], n = !0, a = 1; a < o.length; a++) {
                var d = o[a];
                0 !== s[d] && (n = !1)
            }
            n && (r.splice(t--, 1),
            e = i(i.s = o[0]))
        }
        return e
    }
    var n = {}
      , s = {
        0: 0
    }
      , r = [];
    function i(t) {
        if (n[t])
            return n[t].exports;
        var o = n[t] = {
            i: t,
            l: !1,
            exports: {}
        };
        return e[t].call(o.exports, o, o.exports, i),
        o.l = !0,
        o.exports
    }
    i.m = e,
    i.c = n,
    i.d = function(e, t, o) {
        i.o(e, t) || Object.defineProperty(e, t, {
            enumerable: !0,
            get: o
        })
    }
    ,
    i.r = function(e) {
        "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, {
            value: "Module"
        }),
        Object.defineProperty(e, "__esModule", {
            value: !0
        })
    }
    ,
    i.t = function(e, t) {
        if (1 & t && (e = i(e)),
        8 & t)
            return e;
        if (4 & t && "object" == typeof e && e && e.__esModule)
            return e;
        var o = Object.create(null);
        if (i.r(o),
        Object.defineProperty(o, "default", {
            enumerable: !0,
            value: e
        }),
        2 & t && "string" != typeof e)
            for (var n in e)
                i.d(o, n, function(t) {
                    return e[t]
                }
                .bind(null, n));
        return o
    }
    ,
    i.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        }
        : function() {
            return e
        }
        ;
        return i.d(t, "a", t),
        t
    }
    ,
    i.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }
    ,
    i.p = "/ft/flex-simulator/";
    //
    var a = window.webpackJsonp = window.webpackJsonp || []
      , d = a.push.bind(a);
    a.push = t,
    a = a.slice();
    for (var l = 0; l < a.length; l++)
        t(a[l]);
    var c = d;
    r.push([57, 1]),
    o()
}({
    10: function(e, t, o) {},
    26: function(e, t, o) {
        e.exports = o.p + "images/logo-black.png"
    },
    27: function(e, t, o) {
        "use strict";
        var n = o(8);
        o.n(n).a
    },
    28: function(e, t, o) {
        "use strict";
        var n = o(9);
        o.n(n).a
    },
    54: function(e, t, o) {},
    55: function(e) {
        //e._s(e.$t("title"))
        e.exports = language;
    },
    56: function(e, t, o) {
        "use strict";
        var n = o(10);
        o.n(n).a
    },
    57: function(e, t, o) {
        "use strict";
        o.r(t);
        var n = o(2)
          , s = o(5)
          , r = {
            name: "InboxPane",
            data: ()=>({
                dismissSecs: 5,
                dismissCountDown: 0
            }),
            computed: {
                messages() {
                    return this.showAlert(),
                    this.$store.getters.getMessages
                }
            },
            methods: {
                countDownChanged(e) {
                    this.dismissCountDown = e
                },
                showAlert() {
                    this.dismissCountDown = this.dismissSecs
                }
            }
        }
          , i = o(0)
          , a = Object(i.a)(r, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "inbox-pane"
                }
            }, [e._l(e.messages, (function(t, n) {
                return ["success" === t.level ? 
                    //成功
                    o("b-alert", {
                        key: n,
                        attrs: {
                            variant: "success",
                            dismissible: "",
                            fade: "",
                            show: e.dismissCountDown
                        },
                        on: {
                            "dismiss-count-down": e.countDownChanged
                        }
                    }, [o("i", {
                        staticClass: "fa fa-check"
                    }), e._v(" "), t.path ? o("strong", [e._v("\n        " + e._s(translateMsg(t.path)) + "\n      ")]) : e._e(), e._v(" " + e._s(translateMsg(t.text)) + "\n    ")]) : 
                    //失敗
                    o("b-alert", {
                        key: n,
                        attrs: {
                            variant: "danger",
                            dismissible: "",
                            fade: "",
                            show: e.dismissCountDown
                        },
                        on: {
                            "dismiss-count-down": e.countDownChanged
                        }
                    }, [o("i", {
                        staticClass: "fa fa-exclamation-triangle"
                    }), e._v(" "), t.path ? o("strong", [e._v("\n        " + e._s(translateMsg(t.path)) + "\n      ")]) : e._e(), e._v(" " + e._s(translateMsg(t.text)) + "\n    ")])
                ]
            }
            ))], 2)
        }
        ), [], !1, null, null, null).exports;
        function d(e) {
            return Object.assign({
                name: "none",
                canCopy: !0,
                canMove: !0,
                isAddable: !1,
                addableTypes: [],
                isRemovable: !1,
                iconClass: null,
                //20220811 新增
                    isDeprecated: !1,
                //--
            }, e)
        }
        class l {
            static of(e) {
                if (!e)
                    return null;
                switch (e.type) {
                case "carousel":
                    return d({
                        name: translate(e.type),
                        canCopy: !1,
                        canMove: !1,
                        isAddable: !0,
                        isRemovable: !1,
                        addableTypes: ["bubble"]
                    });
                case "bubble":
                    return function(e) {
                        const t = !!e.root;
                        return d({
                            name: translate(e.type),
                            canMove: !t,
                            isRemovable: !t
                        })
                    }(e);
                case "box":
                    return function(e) {
                        let t = []
                          , o = translate(e.type);
                        switch (e.layout) {
                            case "baseline":
                                //20220811 移除「spacer」
                                t = ["icon", "text", "filler"],//, "spacer"
                                o = o + " [baseline]";
                                break;
                            case "horizontal":
                            case "vertical":
                                //20220811 移除「spacer」
                                t = ["box", "image", "text", "button", "filler", "separator"],//, "spacer"
                                o = o + ` [${e.layout}]`;
                                break;
                        }
                        return d({
                            name: o,
                            isAddable: !0,
                            addableTypes: t,
                            isRemovable: !0
                        })
                    }(e);
                case "header":
                case "hero":
                case "body":
                case "footer":
                    return function(e) {
                        return d({
                            name: translate(e.type),
                            canCopy: !1,
                            canMove: !1,
                            isAddable: 0 === e.children.length,
                            //20220811 新增「video」
                            addableTypes: "hero" === e.type ? ["box", "image", "video"] : ["box"]
                        })
                    }(e);
                case "text":
                    return function(e) {
                        let t = translate(e.type);//text
                        const o = e.children;
                        if (Array.isArray(o) && o.length > 0) {
                            t = t;
                        } else if (e.text) {
                            let o = e.text;
                            o.length > 10 && (o = o.substring(0, 9) + "...");
                            t += " [" + o + "]";
                        }
                        return d({
                            name: t,
                            isRemovable: !0,
                            iconClass: "fa-font",
                            isAddable: !0,
                            addableTypes: ["span"]
                        })
                    }(e);
                case "span":
                    return function(e) {
                        let t = translate(e.type);//span
                        if (e.text) {
                            let o = e.text;
                            o.length > 10 && (o = o.substring(0, 9) + "...");
                            t += " [" + o + "]";
                        }
                        return d({
                            name: t,
                            isRemovable: !0,
                            iconClass: "fa-font"
                        })
                    }(e);
                case "image":
                    return function(e) {
                        let t = translate(e.type);
                        return d({
                            name: t,
                            isRemovable: !0,
                            iconClass: "fa-picture-o"
                        });
                    }(e);
                //20220811 新增
                    case "video":
                        return function(e) {
                            let t = translate(e.type);
                            if(e.children && 0===e.children.length){
                                t += " (Please set altContent by adding child node)";
                            }
                            return d({
                                name: t,
                                isRemovable: !0,
                                isAddable: (e.children && 0===e.children.length),
                                iconClass: "fa-picture-o",
                                addableTypes: ["box", "image"]
                            })
                        }(e);
                //--
                case "button":
                    return function(e) {
                        let t = translate(e.type);
                        if(e.action && e.action.label){
                            t += " [" + e.action.label + "]";
                        }
                        return d({
                            name: t,
                            isRemovable: !0,
                            iconClass: "fa-caret-square-o-right"
                        })
                    }(e);
                case "filler":
                    return d({
                        name: translate(e.type),
                        isRemovable: !0,
                        iconClass: "fa-arrows"
                    });
                case "icon":
                    return function(e) {
                        let t = translate(e.type);
                        return d({
                            name: t,
                            isRemovable: !0,
                            iconClass: "fa-smile-o"
                        });
                    }(e);
                case "separator":
                    return d({
                        name: translate(e.type),
                        isRemovable: !0,
                        iconClass: "fa-minus-square-o"
                    });
                case "spacer":
                    return d({
                        name: translate(e.type),
                        isRemovable: !0,
                        iconClass: "fa-square-o",
                        //20220811 新增
                            isDeprecated: !0,
                        //--
                    });
                default:
                    throw new Error("unexpected type: " + e.type)
                }
            }
        }
        var c = {
            name: "TreeItem",
            props: {
                node: {
                    type: Object,
                    required: !0
                }
            },
            data: ()=>({
                open: !0
            }),
            computed: {
                nodeExt() {
                    return l.of(this.node)
                },
                isFocused() {
                    return this.$store.getters.getMultiSelectedNodeIds.includes(this.node.id)
                },
                hasError() {
                    return this.$store.getters.getErrors.findIndex(e=>e.node.id === this.node.id) >= 0
                },
                classObject() {
                    return {
                        "has-error": this.hasError,
                        deprecated: this.nodeExt.isDeprecated
                    }
                }
            },
            methods: {
                select(e) {
                    this.isFocused ? this.$store.commit("removeSelectedNodeId", this.node.id) : !function(e) {
                        return e.ctrlKey && !e.metaKey || !e.ctrlKey && e.metaKey
                    }(e) ? this.$store.commit("setSelectedNodeId", this.node.id) : this.$store.commit("addSelectedNodeId", this.node.id)
                },
                enter() {
                    this.$store.commit("setHoveredNodeId", this.node.id)
                },
                leave() {
                    this.$store.commit("setHoveredNodeId", "")
                },
                toggle() {
                    this.open = !this.open
                }
            }
        }
          , u = {
            name: "TreePane",
            components: {
                TreeItem: Object(i.a)(c, (function() {
                    var e = this
                      , t = e.$createElement
                      , o = e._self._c || t;
                    return e.node.type ? o("li", {
                        class: e.classObject
                    }, [o("div", {
                        class: {
                            focused: e.isFocused
                        },
                        on: {
                            mouseenter: e.enter,
                            mouseleave: e.leave,
                            click: e.select
                        }
                    }, [e.node.children ? o("span", {
                        staticClass: "node-icon",
                        on: {
                            click: e.toggle
                        }
                    }, [e.open ? o("i", {
                        staticClass: "fa fa-caret-down"
                    }) : o("i", {
                        staticClass: "fa fa-caret-right"
                    })]) : o("span", {
                        staticClass: "node-icon"
                    }, [e.nodeExt.iconClass ? o("i", {
                        staticClass: "fa",
                        class: e.nodeExt.iconClass
                    }) : e._e()]), e._v(" "), o("span", {
                        staticClass: "node-name"
                    }, [e._v("\n      " + e._s(e.nodeExt.name) + "\n    ")])]), e._v(" "), e.node.children ? o("ul", {
                        directives: [{
                            name: "show",
                            rawName: "v-show",
                            value: e.open,
                            expression: "open"
                        }]
                    }, e._l(e.node.children, (function(e) {
                        return o("TreeItem", {
                            key: e.id,
                            attrs: {
                                node: e
                            }
                        })
                    }
                    )), 1) : e._e()]) : e._e()
                }
                ), [], !1, null, null, null).exports
            },
            computed: {
                tree() {
                    return this.$store.getters.getTree
                }
            }
        }
          , p = Object(i.a)(u, (function() {
            var e = this.$createElement
              , t = this._self._c || e;
            return t("div", {
                attrs: {
                    id: "tree-pane"
                }
            }, [this.tree ? t("ul", [t("TreeItem", {
                attrs: {
                    node: this.tree
                }
            })], 1) : this._e()])
        }
        ), [], !1, null, null, null).exports;
        var m = {
            name: "ViewerPane",
            computed: {
                html() {
                    return this.$store.getters.getHtml
                },
                hoveredNodeId() {
                    return this.$store.getters.getHoveredNodeId
                },
                classObject() {
                    const e = this.$store.getters.getContainerType;
                    return {
                        flexSolo: "bubble" === e,
                        flexCarousel: "carousel" === e
                    }
                }
            },
            watch: {
                html(e) {
                    const t = this.$refs.frame.contentWindow.document;
                    t.open();
                    if(e){
                        t.write(e);
                    }
                    t.write('<div id="highlight"></div>');
                    t.write("\n<style>\n  #highlight {\n    position: absolute;\n    z-index: 100;\n    background-color: #999999;\n    opacity: 0.5;\n    display: none;\n  }\n</style>");
                    t.close();
                },
                hoveredNodeId(e) {
                    const t = this.$refs.frame.contentWindow.document
                      , o = t.getElementById("highlight");
                    if (o && (o.style.display = "none"),
                    e && o) {
                        const n = t.getElementById(e);
                        if (n) {
                            const e = n.getBoundingClientRect();
                            o.style.display = "block",
                            o.style.top = e.top + "px",
                            o.style.left = e.left + "px",
                            o.style.width = e.width + "px",
                            o.style.height = e.height + "px"
                        }
                    }
                }
            }
        }
          , h = Object(i.a)(m, (function() {
            var e = this.$createElement
              , t = this._self._c || e;
            return t("div", {
                attrs: {
                    id: "viewer-pane"
                }
            }, [t("iframe", {
                ref: "frame",
                class: this.classObject,
                attrs: {
                    id: "viewer-frame",
                    scrolling: "no",
                    onload: "FrameLoaded();",
                }
            })])
        }
        ), [], !1, null, null, null).exports;
        class f {
            static ofText(e, t, o={}) {
                const n = o.newline;
                return n && t && (t = t.replace(/\n/g, "\\n")),
                {
                    type: "text",
                    name: e,
                    value: t,
                    parser: e=>n && e ? e.replace(/\\n/g, "\n") : e,
                    ...o
                }
            }
            static ofNumber(e, t, o={}) {
                return {
                    type: "text",
                    name: e,
                    value: t,
                    parser: e=>{
                        const t = parseFloat(e);
                        return isNaN(t) ? e : t
                    }
                    ,
                    ...o
                }
            }
            static ofBool(e, t, o={}) {
                const n = Object.assign({
                    options: ["true", "false"]
                }, o);
                return {
                    type: "text",
                    name: e,
                    value: "boolean" == typeof t ? Boolean(t).toString() : void 0,
                    parser: e=>"true" === e,
                    ...n
                }
            }
        }
        var b = {
            name: "FieldView",
            props: {
                id: {
                    type: String,
                    required: !0
                },
                field: {
                    type: Object,
                    required: !0
                },
                parent: {
                    type: String,
                    required: !1,
                    default: null
                },
                label: {
                    type: String,
                    required: !1,
                    default: null
                }
            },
            computed: {
                classObject() {
                    return {
                        "form-control": !0,
                        "is-invalid": this.messages.length > 0
                    }
                },
                messages() {
                    return this.$store.getters.getErrors.filter(e=>e.node.id === this.id).filter(e=>e.property === this.field.name).filter(e=>null === this.parent || e.parent === this.parent).map(e=>e.text)
                }
            },
            methods: {
                change(e) {
                    if (this.$listeners && this.$listeners.change)
                        return void this.$emit("change", e);
                    const t = e.target.value;
                    this.update(t)
                },
                update(e) {
                    null != e && e.length > 0 ? this.$store.commit("updateProperty", {
                        id: this.id,
                        property: this.field.name,
                        value: this.field.parser(e),
                        parent: this.parent
                    }) : this.$store.commit("deleteProperty", {
                        id: this.id,
                        property: this.field.name,
                        parent: this.parent
                    })
                }
            }
        }
          , v = Object(i.a)(b, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                staticClass: "form-group row"
            }, [o("label", {
                staticClass: "col-sm-3 col-form-label"
            }, [e.label ? [e._v("\n      " + e._s(e.label) + "\n    ")] : [e._v("\n      " + e._s(e.field.name) + "\n    ")]], 2), e._v(" "), o("div", {
                staticClass: "col-sm-9"
            }, [e.field.readonly ? [o("input", {
                class: e.classObject,
                attrs: {
                    type: "text",
                    readonly: ""
                },
                domProps: {
                    value: e.field.value
                }
            })] : e.field.options && e.field.options.length > 0 && e.field.combo ? [o("div", {
                staticClass: "input-group"
            }, [o("input", {
                class: e.classObject,
                attrs: {
                    type: "text"
                },
                domProps: {
                    value: e.field.value
                },
                on: {
                    change: e.change
                }
            }), e._v(" "), o("div", {
                staticClass: "input-group-append"
            }, [o("b-dropdown", {
                attrs: {
                    text: e.field.combo,
                    size: "md",
                    variant: "outline-secondary"
                }
            }, e._l(e.field.options, (function(t) {
                return o("b-dropdown-item", {
                    key: t,
                    on: {
                        click: function(o) {
                            return e.update(t)
                        }
                    }
                }, [e._v(e._s(t))])
            }
            )), 1)], 1)])] : e.field.options && e.field.options.length > 0 ? [o("select", {
                class: e.classObject,
                on: {
                    change: e.change
                }
            }, [e.field.required ? e._e() : o("option", {
                attrs: {
                    value: ""
                }
            }), e._v(" "), e._l(e.field.options, (function(t) {
                return o("option", {
                    key: t,
                    domProps: {
                        selected: t === e.field.value,
                        value: t
                    }
                }, [e._v("\n          " + e._s(t) + "\n        ")])
            }
            ))], 2)] : [o("input", {
                class: e.classObject,
                attrs: {
                    type: "text"
                },
                domProps: {
                    value: e.field.value
                },
                on: {
                    change: e.change
                }
            })], e._v(" "), e.field.memo ? o("small", {
                staticClass: "form-text text-muted"
            }, [e._v("\n      " + e._s(e.field.memo) + "\n    ")]) : e._e(), e._v(" "), e._l(e.messages, (function(t) {
                return o("div", {
                    key: t,
                    staticClass: "invalid-feedback",
                    staticStyle: {
                        display: "block"
                    }
                }, [e._v("\n      " + e._s(t) + "\n    ")])
            }
            ))], 2)])
        }
        ), [], !1, null, null, null).exports
          , BlockForm = {
            name: "BlockForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                style() {
                    return {
                        fields: [f.ofText(translate('backgroundColor'), this.node.style.backgroundColor), f.ofBool(translate('separator'), this.node.style.separator), f.ofText(translate('separatorColor'), this.node.style.separatorColor)]
                    }
                }
            }
        }
          , BlockFormObj = Object(i.a)(BlockForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h4", [e._v(translate('Style'))]), e._v(" "), o("div", [o("form", e._l(e.style.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t,
                        parent: "style"
                    }
                })
            }
            )), 1)])])])])
        }
        ), [], !1, null, null, null).exports
          , x = {
            name: "PostbackForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('label'), this.node.action.label), f.ofText(translate('data'), this.node.action.data), f.ofText(translate('displayText'), this.node.action.displayText)]
                }
            }
        }
          , _ = Object(i.a)(x, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t,
                        parent: "action"
                    }
                })
            }
            )), 1)
        }
        ), [], !1, null, null, null).exports
          , w = {
            name: "ObjectForm",
            components: {
                FieldView: v
            },
            props: {
                id: {
                    type: String,
                    required: !0
                },
                name: {
                    type: String,
                    required: !0
                },
                fields: {
                    type: Array,
                    required: !0
                },
                parent: {
                    type: String,
                    required: !1,
                    default: null
                },
                obj: {
                    type: Object,
                    required: !1,
                    default: ()=>{}
                }
            },
            methods: {
                label(e) {
                    return this.name + "." + e.name
                },
                change(e, t) {
                    const o = e.target.value
                      , n = Object.assign({}, this.obj);
                    null != o && o.length > 0 ? n[t.name] = t.parser(o) : delete n[t.name],
                    0 === Object.keys(n).length ? this.$store.commit("deleteProperty", {
                        id: this.id,
                        property: this.name,
                        parent: this.parent
                    }) : this.$store.commit("updateProperty", {
                        id: this.id,
                        property: this.name,
                        value: n,
                        parent: this.parent
                    })
                }
            }
        }
          , k = {
            name: "AltUriForm",
            components: {
                ObjectForm: Object(i.a)(w, (function() {
                    var e = this
                      , t = e.$createElement
                      , o = e._self._c || t;
                    return o("div", e._l(e.fields, (function(t) {
                        return o("FieldView", {
                            key: t.name,
                            attrs: {
                                id: e.id,
                                label: e.label(t),
                                field: t
                            },
                            on: {
                                change: function(o) {
                                    return e.change(o, t)
                                }
                            }
                        })
                    }
                    )), 1)
                }
                ), [], !1, null, null, null).exports
            },
            props: {
                id: String,
                altUri: {
                    type: Object,
                    required: !1,
                    default: ()=>({})
                }
            },
            computed: {
                fields() {
                    return [f.ofText(translate('desktop'), this.altUri.desktop)]
                }
            }
        }
          , T = {
            name: "UriForm",
            components: {
                FieldView: v,
                AltUriForm: Object(i.a)(k, (function() {
                    var e = this.$createElement;
                    return (this._self._c || e)("ObjectForm", {
                        attrs: {
                            id: this.id,
                            name: translate('altUri'),
                            fields: this.fields,
                            obj: this.altUri,
                            parent: "action"
                        }
                    })
                }
                ), [], !1, null, null, null).exports
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('label'), this.node.action.label), f.ofText(translate('uri'), this.node.action.uri)]
                }
            }
        }
          , C = Object(i.a)(T, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", [e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t,
                        parent: "action"
                    }
                })
            }
            )), e._v(" "), o("AltUriForm", {
                attrs: {
                    id: e.node.id,
                    altUri: e.node.action.altUri
                }
            })], 2)
        }
        ), [], !1, null, null, null).exports
          , F = {
            name: "MessageForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('label'), this.node.action.label), f.ofText(translate('text'), this.node.action.text)]
                }
            }
        }
          , $ = Object(i.a)(F, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t,
                        parent: "action"
                    }
                })
            }
            )), 1)
        }
        ), [], !1, null, null, null).exports
          , j = {
            name: "DateTimePicker",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('label'), this.node.action.label), f.ofText(translate('data'), this.node.action.data), f.ofText(translate('mode'), this.node.action.mode), f.ofText(translate('initial'), this.node.action.initial), f.ofText(translate('max'), this.node.action.max), f.ofText(translate('min'), this.node.action.min)]
                }
            }
        }
          , O = Object(i.a)(j, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t,
                        parent: "action"
                    }
                })
            }
            )), 1)
        }
        ), [], !1, null, null, null).exports;
        var S = {
            of: function e(t) {
                switch (t) {
                case "bubble":
                    return {
                        type: "bubble",
                        body: e("box")
                    };
                case "carousel":
                    return {
                        type: "carousel",
                        contents: [e("bubble"), e("bubble")]
                    };
                case "box":
                    return {
                        type: "box",
                        layout: "vertical",
                        contents: []
                    };
                case "text":
                    return {
                        type: "text",
                        text: "hello, world"
                    };
                case "span":
                    return {
                        type: "span",
                        text: "hello, world"
                    };
                case "image":
                    return {
                        type: "image",
                        url: "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png"
                    };
                //20220811 新增
                    case "video":
                        return {
                            type: "video",
                            url: window.location.origin + "/library/res/images/original.mp4",//https_url_to_video
                            previewUrl: window.location.origin + "/library/res/images/preview.jpg",//https_url_to_preview_image
                            aspectRatio: "20:13",
                            altContent: {
                                type: "image",
                                size: "full",
                                aspectRatio: "20:13",
                                aspectMode: "cover",
                                url: "https://scdn.line-apps.com/n/channel_devcenter/img/fx/01_1_cafe.png"
                            }
                        };
                //--
                case "button":
                    return {
                        type: "button",
                        action: e("uri")
                    };
                case "filler":
                    return {
                        type: "filler"
                    };
                case "icon":
                    return {
                        type: "icon",
                        url: "https://scdn.line-apps.com/n/channel_devcenter/img/fx/review_gold_star_28.png"
                    };
                case "separator":
                    return {
                        type: "separator"
                    };
                // //20220811 移除
                //     case "spacer":
                //         return {
                //             type: "spacer"
                //         };
                // //--
                case "postback":
                    return {
                        type: "postback",
                        label: "action",
                        data: "hello"
                    };
                case "message":
                    return {
                        type: "message",
                        label: "action",
                        text: "hello"
                    };
                case "uri":
                    return {
                        type: "uri",
                        label: "action",
                        uri: "http://linecorp.com/"
                    };
                case "datetimepicker":
                    return {
                        type: "datetimepicker",
                        label: "action",
                        data: "hello",
                        mode: "date"
                    };
                case "linearGradient":
                    return {
                        type: "linearGradient",
                        angle: "0deg",
                        startColor: "#000000",
                        endColor: "#ffffff"
                    }
                }
                return null
            }
        }
          , B = {
            name: "ActionForm",
            components: {
                UriActionForm: C,
                MessageActionForm: $,
                DateTimePickerActionForm: O,
                PostbackActionForm: _
            },
            props: {
                node: Object
            },
            data: function() {
                return {
                    actionTypes: ["postback", "uri", "message", "datetimepicker"]
                }
            },
            computed: {
                action() {
                    return this.node.action
                }
            },
            methods: {
                changeAction: function(e) {
                    const t = e.target.value;
                    null != t && t.length > 0 ? this.$store.commit("updateProperty", {
                        id: this.node.id,
                        property: "action",
                        value: S.of(t)
                    }) : this.$store.commit("deleteProperty", {
                        id: this.node.id,
                        property: "action"
                    })
                }
            }
        }
          , R = Object(i.a)(B, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", [o("h4", [e._v(translate('Action'))]), e._v(" "), o("div", [o("form", [o("div", {
                staticClass: "form-group row"
            }, [o("label", {
                staticClass: "col-sm-3 col-form-label"
            }, [e._v(translate('type'))]), e._v(" "), o("div", {
                staticClass: "col-sm-9"
            }, [o("select", {
                staticClass: "form-control",
                on: {
                    change: e.changeAction
                }
            }, [o("option", {
                attrs: {
                    value: ""
                }
            }), e._v(" "), e._l(e.actionTypes, (function(t) {
                return o("option", {
                    key: t,
                    domProps: {
                        selected: e.action && t === e.action.type,
                        value: t
                    }
                }, [e._v("\n              " + e._s(t) + "\n            ")])
            }
            ))], 2)])]), e._v(" "), e.action && "postback" === e.action.type ? o("PostbackActionForm", {
                attrs: {
                    node: e.node
                }
            }) : e.action && "uri" === e.action.type ? o("UriActionForm", {
                attrs: {
                    node: e.node
                }
            }) : e.action && "message" === e.action.type ? o("MessageActionForm", {
                attrs: {
                    node: e.node
                }
            }) : e.action && "datetimepicker" === e.action.type ? o("DateTimePickerActionForm", {
                attrs: {
                    node: e.node
                }
            }) : e._e()], 1)])])
        }
        ), [], !1, null, null, null).exports;
        const E = ["xxs", "xs", "sm", "md", "lg", "xl", "xxl", "3xl", "4xl", "5xl"]//? size
          , I = ["regular", "bold"]//span.weight、span.weight
          , N = ["start", "end", "center"]//align
          , A = ["top", "bottom", "center"]//gravity
          , M = ["none", "xs", "sm", "md", "lg", "xl", "xxl"]//margin
          , P = ["none", "xs", "sm", "md", "lg", "xl", "xxl"]//spacing
          , G = ["xs", "sm", "md", "lg", "xl", "xxl"]//spacer.size
          , V = ["xxs", "xs", "sm", "md", "lg", "xl", "xxl", "3xl", "4xl", "5xl", "full"]//image.size
          , z = ["cover", "fit"]//image.aspectMode
          , U = ["ltr", "rtl"]//bubble.direction
          , q = ["giga", "mega", "kilo", "micro", "nano"]//bubble.size
          , L = ["baseline", "horizontal", "vertical"]//bubble.layout
          , H = ["none", "light", "normal", "medium", "semi-bold", "bold"]//borderWidth
          , D = ["none", "xs", "sm", "md", "lg", "xl", "xxl"]//cornerRadius
          , J = ["link", "primary", "secondary"]//button.style
          , W = ["sm", "md"]//button.height
          , K = ["relative", "absolute"]//position
          , X = ["normal", "italic"]//text.style、span.style
          , Q = ["none", "underline", "line-through"]//text.decoration、span.decoration
          , Y = ["center", "flex-start", "flex-end", "space-between", "space-around", "space-evenly"]//justifyContent
          , Z = ["center", "flex-start", "flex-end"]//alignItems
          , ee = ["shrink-to-fit"]//adjustMode
          , te = ["none", "xs", "sm", "md", "lg", "xl", "xxl"]//offset
          , oe = ["none", "xs", "sm", "md", "lg", "xl", "xxl"];//padding
        var ne = {
            name: "OffsetForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('offsetTop'), this.node.offsetTop, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: te
                    }), f.ofText(translate('offsetBottom'), this.node.offsetBottom, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: te
                    }), f.ofText(translate('offsetStart'), this.node.offsetStart, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: te
                    }), f.ofText(translate('offsetEnd'), this.node.offsetEnd, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: te
                    })]
                }
            }
        }
          , se = Object(i.a)(ne, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", [o("h4", [e._v(translate('Offset'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])])
        }
        ), [], !1, null, null, null).exports
          , re = {
            name: "PaddingForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('paddingAll'), this.node.paddingAll, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: oe
                    }), f.ofText(translate('paddingTop'), this.node.paddingTop, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: oe
                    }), f.ofText(translate('paddingBottom'), this.node.paddingBottom, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: oe
                    }), f.ofText(translate('paddingStart'), this.node.paddingStart, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: oe
                    }), f.ofText(translate('paddingEnd'), this.node.paddingEnd, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: oe
                    })]
                }
            }
        }
          , ie = Object(i.a)(re, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", [o("h4", [e._v(translate('Padding'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])])
        }
        ), [], !1, null, null, null).exports
          , ae = {
            name: "LinearGradientForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('angle'), this.node.background.angle), f.ofText(translate('startColor'), this.node.background.startColor, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    }), f.ofText(translate('endColor'), this.node.background.endColor, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    }), f.ofText(translate('centerColor'), this.node.background.centerColor, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    }), f.ofText(translate('centerPosition'), this.node.background.centerPosition)]
                }
            }
        }
          , de = {
            name: "BackgroundForm",
            components: {
                LinearGradientForm: Object(i.a)(ae, (function() {
                    var e = this
                      , t = e.$createElement
                      , o = e._self._c || t;
                    return o("div", e._l(e.fields, (function(t) {
                        return o("FieldView", {
                            key: t.name,
                            attrs: {
                                id: e.node.id,
                                field: t,
                                parent: "background"
                            }
                        })
                    }
                    )), 1)
                }
                ), [], !1, null, null, null).exports
            },
            props: {
                node: Object
            },
            data: function() {
                return {
                    backgroundTypes: ["linearGradient"]
                }
            },
            computed: {
                background() {
                    return this.node.background
                }
            },
            methods: {
                changeBackground: function(e) {
                    const t = e.target.value;
                    null != t && t.length > 0 ? this.$store.commit("updateProperty", {
                        id: this.node.id,
                        property: "background",
                        value: S.of(t)
                    }) : this.$store.commit("deleteProperty", {
                        id: this.node.id,
                        property: "background"
                    })
                }
            }
        }
          , BoxForm = {
            name: "BoxForm",
            components: {
                BackgroundForm: Object(i.a)(de, (function() {
                    var e = this
                      , t = e.$createElement
                      , o = e._self._c || t;
                    return o("div", [o("h4", [e._v(translate('Background'))]), e._v(" "), o("div", [o("form", [o("div", {
                        staticClass: "form-group row"
                    }, [o("label", {
                        staticClass: "col-sm-3 col-form-label"
                    }, [e._v(translate('type'))]), e._v(" "), o("div", {
                        staticClass: "col-sm-9"
                    }, [o("select", {
                        staticClass: "form-control",
                        on: {
                            change: e.changeBackground
                        }
                    }, [o("option", {
                        attrs: {
                            value: ""
                        }
                    }), e._v(" "), e._l(e.backgroundTypes, (function(t) {
                        return o("option", {
                            key: t,
                            domProps: {
                                selected: e.background && t === e.background.type,
                                value: t
                            }
                        }, [e._v("\n              " + e._s(t) + "\n            ")])
                    }
                    ))], 2)])]), e._v(" "), e.background && "linearGradient" === e.background.type ? o("LinearGradientForm", {
                        attrs: {
                            node: e.node
                        }
                    }) : e._e()], 1)])])
                }
                ), [], !1, null, null, null).exports,
                FieldView: v,
                ActionForm: R,
                OffsetForm: se,
                PaddingForm: ie
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "box", {
                        readonly: !0
                    }), f.ofText(translate('layout'), this.node.layout, {
                        required: !0,
                        options: L
                    }), f.ofText(translate('position'), this.node.position, {
                        options: K
                    }), f.ofNumber(translate('flex'), this.node.flex), f.ofText(translate('spacing'), this.node.spacing, {
                        combo: "px "+ translate('orText') +" "+ translate('keywords'),
                        options: P
                    }), f.ofText(translate('margin'), this.node.margin, {
                        combo: "px "+ translate('orText') +" "+ translate('keywords'),
                        options: M
                    //20220811 加上「maxWidth、maxHeight」
                    }), f.ofText(translate('width'), this.node.width), f.ofText(translate('height'), this.node.height), f.ofText(translate('maxWidth'), this.node.maxWidth), f.ofText(translate('maxHeight'), this.node.maxHeight), f.ofText(translate('backgroundColor'), this.node.backgroundColor, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    }), f.ofText(translate('borderWidth'), this.node.borderWidth, {
                        combo: "px "+ translate('orText') +" "+ translate('keywords'),
                        options: H
                    }), f.ofText(translate('borderColor'), this.node.borderColor, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    }), f.ofText(translate('cornerRadius'), this.node.cornerRadius, {
                        combo: "px "+ translate('orText') +" "+ translate('keywords'),
                        options: D
                    }), f.ofText(translate('justifyContent'), this.node.justifyContent, {
                        options: Y
                    }), f.ofText(translate('alignItems'), this.node.alignItems, {
                        options: Z
                    })]
                }
            }
        }
          , BoxFormObj = Object(i.a)(BoxForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Box'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])]), e._v(" "), o("hr"), e._v(" "), o("OffsetForm", {
                attrs: {
                    node: e.node
                }
            }), e._v(" "), o("hr"), e._v(" "), o("PaddingForm", {
                attrs: {
                    node: e.node
                }
            }), e._v(" "), o("hr"), e._v(" "), o("BackgroundForm", {
                attrs: {
                    node: e.node
                }
            }), e._v(" "), o("hr"), e._v(" "), o("ActionForm", {
                attrs: {
                    node: e.node
                }
            })], 1)])
        }
        ), [], !1, null, null, null).exports
          , TextForm = {
            name: "TextForm",
            components: {
                FieldView: v,
                ActionForm: R,
                OffsetForm: se
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "text", {
                        readonly: !0
                    }), f.ofText(translate('text'), this.node.text, {
                        required: !0,
                        newline: !0
                    }), f.ofNumber(translate('flex'), this.node.flex), f.ofText(translate('margin'), this.node.margin, {
                        combo: "px " + translate('orText') + ' ' + translate('keywords'),
                        options: M
                    }), f.ofText(translate('size'), this.node.size, {
                        combo: "px " + translate('orText') + ' ' + translate('keywords'),
                        options: E
                    //20220811 加上「lineSpacing」
                    }), f.ofText(translate('lineSpacing'), this.node.lineSpacing), f.ofText(translate('color'), this.node.color, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    }), f.ofText(translate('weight'), this.node.weight, {
                        options: I
                    }), f.ofText(translate('style'), this.node.style, {
                        options: X
                    }), f.ofText(translate('decoration'), this.node.decoration, {
                        options: Q
                    }), f.ofText(translate('position'), this.node.position, {
                        options: K
                    }), f.ofText(translate('align'), this.node.align, {
                        options: N
                    }), f.ofText(translate('gravity'), this.node.gravity, {
                        options: A
                    }), f.ofBool(translate('wrap'), this.node.wrap), f.ofNumber(translate('maxLines'), this.node.maxLines, {
                        memo: translate('maxLines_memo')
                    }), f.ofText(translate('adjustMode'), this.node.adjustMode, {
                        options: ee,
                        memo: translate('adjustMode_memo')
                    })]
                }
            }
        }
          , TextFormObj = Object(i.a)(TextForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Text'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])]), e._v(" "), o("hr"), e._v(" "), o("OffsetForm", {
                attrs: {
                    node: e.node
                }
            }), e._v(" "), o("hr"), e._v(" "), o("ActionForm", {
                attrs: {
                    node: e.node
                }
            })], 1)])
        }
        ), [], !1, null, null, null).exports
          , ImageForm = {
            name: "ImageForm",
            components: {
                FieldView: v,
                ActionForm: R,
                OffsetForm: se
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "image", {
                        readonly: !0
                    }), f.ofNumber(translate('flex'), this.node.flex), f.ofText(translate('position'), this.node.position, {
                        options: K
                    }), f.ofText(translate('url'), this.node.url, {
                        required: !0
                    }), f.ofText(translate('margin'), this.node.margin, {
                        combo: "px " + translate('orText') + ' ' + translate('keywords'),
                        options: M
                    }), f.ofText(translate('align'), this.node.align, {
                        options: N
                    }), f.ofText(translate('gravity'), this.node.gravity, {
                        options: A
                    }), f.ofText(translate('size'), this.node.size, {
                        combo: "px, % " + translate('orText') + ' ' + translate('keywords'),
                        options: V
                    }), f.ofText(translate('aspectRatio'), this.node.aspectRatio), f.ofText(translate('aspectMode'), this.node.aspectMode, {
                        options: z
                    }), f.ofText(translate('backgroundColor'), this.node.backgroundColor, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    }), f.ofBool(translate('animated'), this.node.animated)]
                }
            }
        }
          , ImageFormObj = Object(i.a)(ImageForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Image'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])]), e._v(" "), o("hr"), e._v(" "), o("OffsetForm", {
                attrs: {
                    node: e.node
                }
            }), e._v(" "), o("hr"), e._v(" "), o("ActionForm", {
                attrs: {
                    node: e.node
                }
            })], 1)])
        }
        ), [], !1, null, null, null).exports
        //20220811
            , VideoForm = {
                name: "VideoForm",
                components: {
                    FieldView: v,
                    ActionForm: R
                },
                props: {
                    node: Object
                },
                computed: {
                    fields() {
                        return [f.ofText("url", this.node.url, {
                            required: !0
                        }), f.ofText("previewUrl", this.node.previewUrl, {
                            required: !0
                        }), f.ofText("aspectRatio", this.node.aspectRatio)]
                    }
                }
            }
            , VideoFormObj = Object(i.a)(VideoForm, (function() {
                var e = this
                , t = e.$createElement
                , o = e._self._c || t;
                return o("div", {
                    attrs: {
                        id: "form-pane"
                    }
                }, [o("div", [o("div", [o("h1", [e._v(translate('Video'))]), e._v(" "), o("div", [e._m(0), e._v(" "), o("form", e._l(e.fields, (function(t) {
                    return o("FieldView", {
                        key: t.name,
                        attrs: {
                            id: e.node.id,
                            field: t
                        }
                    })
                }
                )), 1)])]), e._v(" "), o("hr"), e._v(" "), o("ActionForm", {
                    attrs: {
                        node: e.node
                    }
                })], 1)])
            }
            ), [function() {
                var e = this.$createElement
                , t = this._self._c || e;
                return t("div", {
                    staticClass: "alert alert-warning"
                }, [this._v('-' + translate('Video is not shown in simulator. Instead, you'+"'"+'ll see alternative content (altContent)')), t("br"), this._v('-' + translate('You can configure altContent by adding/removing the child node of the video'))])
            }
            ], !1, null, null, null).exports
        //--
          , IconForm = {
            name: "IconForm",
            components: {
                FieldView: v,
                OffsetForm: se
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "icon", {
                        readonly: !0
                    }), f.ofText(translate('position'), this.node.position, {
                        options: K
                    }), f.ofText(translate('url'), this.node.url, {
                        required: !0
                    }), f.ofText(translate('margin'), this.node.margin, {
                        combo: "px " + translate('orText') + ' ' + translate('keywords'),
                        options: M
                    }), f.ofText(translate('size'), this.node.size, {
                        combo: "px " + translate('orText') + ' ' + translate('keywords'),
                        options: E
                    }), f.ofText(translate('aspectRatio'), this.node.aspectRatio)]
                }
            }
        }
          , IconFormObj = Object(i.a)(IconForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Icon'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])]), e._v(" "), o("hr"), e._v(" "), o("OffsetForm", {
                attrs: {
                    node: e.node
                }
            })], 1)])
        }
        ), [], !1, null, null, null).exports
          , SeparatorForm = {
            name: "SeparatorForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "separator", {
                        readonly: !0
                    }), f.ofText(translate('margin'), this.node.margin, {
                        combo: "px " + translate('orText') + ' ' + translate('keywords'),
                        options: M
                    }), f.ofText(translate('color'), this.node.color, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    })]
                }
            }
        }
          , SeparatorFormObj = Object(i.a)(SeparatorForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Separator'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])])])])
        }
        ), [], !1, null, null, null).exports
          , FillerForm = {
            name: "FillerForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "filler", {
                        readonly: !0
                    }), f.ofNumber(translate('flex'), this.node.flex)]
                }
            }
        }
          , FillerFormObj = Object(i.a)(FillerForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Filler'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])])])])
        }
        ), [], !1, null, null, null).exports
          , SpacerForm = {
            name: "SpacerForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "spacer", {
                        readonly: !0
                    }), f.ofText(translate('size'), this.node.size, {
                        options: G
                    })]
                }
            }
        }
          , SpacerFormObj = Object(i.a)(SpacerForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", 
                    [o("div", [
                        o("h1", [e._v(translate('Spacer'))]),
                        //20220811
                            e._v(" "),
                            o("div", {
                                staticClass: "alert alert-danger"
                            }, [
                                e._v(translate('Spacer is no longer supported and will be removed in a future version.'))
                            ]),
                        //--
                        e._v(" "),
                        o("div", [o("form", e._l(e.fields, (function(t) {
                            return o("FieldView", {
                                key: t.name,
                                attrs: {
                                    id: e.node.id,
                                    field: t
                                }
                            })
                        })), 1)])
                    ])])
                ])
        }
        ), [], !1, null, null, null).exports
          , ButtonForm = {
            name: "ButtonForm",
            components: {
                FieldView: v,
                ActionForm: R,
                OffsetForm: se
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "button", {
                        readonly: !0
                    }), f.ofNumber(translate('flex'), this.node.flex), f.ofText(translate('position'), this.node.position, {
                        options: K
                    }), f.ofText(translate('margin'), this.node.margin, {
                        combo: "px " + translate('orText') + ' ' + translate('keywords'),
                        options: M
                    }), f.ofText(translate('height'), this.node.height, {
                        options: W
                    }), f.ofText(translate('style'), this.node.style, {
                        options: J
                    }), f.ofText(translate('color'), this.node.color, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    }), f.ofText(translate('gravity'), this.node.gravity, {
                        options: A
                    }), f.ofText(translate('adjustMode'), this.node.adjustMode, {
                        options: ee,
                        memo: translate('adjustMode_memo')
                    })]
                }
            }
        }
          , ButtonFormObj = Object(i.a)(ButtonForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Button'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])]), e._v(" "), o("hr"), e._v(" "), o("OffsetForm", {
                attrs: {
                    node: e.node
                }
            }), e._v(" "), o("hr"), e._v(" "), o("ActionForm", {
                attrs: {
                    node: e.node
                }
            })], 1)])
        }
        ), [], !1, null, null, null).exports
          , BubbleForm = {
            name: "BubbleForm",
            components: {
                FieldView: v,
                ActionForm: R
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "bubble", {
                        readonly: !0
                    }), f.ofText(translate('direction'), this.node.direction, {
                        options: U
                    }), f.ofText(translate('size'), this.node.size, {
                        options: q
                    })]
                }
            }
        }
          , BubbleFormObj = Object(i.a)(BubbleForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Bubble'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])]), e._v(" "), o("ActionForm", {
                attrs: {
                    node: e.node
                }
            })], 1)])
        }
        ), [], !1, null, null, null).exports
          , CarouselForm = {
            name: "CarouselForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "carousel", {
                        readonly: !0
                    })]
                }
            }
        }
          , CarouselFormObj = Object(i.a)(CarouselForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Carousel'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])])])])
        }
        ), [], !1, null, null, null).exports
          , SpanForm = {
            name: "SpanForm",
            components: {
                FieldView: v
            },
            props: {
                node: Object
            },
            computed: {
                fields() {
                    return [f.ofText(translate('type'), "span", {
                        readonly: !0
                    }), f.ofText(translate('text'), this.node.text, {
                        required: !0,
                        newline: !0
                    }), f.ofText(translate('size'), this.node.size, {
                        combo: "px " + translate('orText') + ' ' + translate('keywords'),
                        options: E
                    }), f.ofText(translate('color'), this.node.color, {
                        memo: "#RRGGBB "+ translate('orText') +" #RRGGBBAA"
                    }), f.ofText(translate('weight'), this.node.weight, {
                        options: I
                    }), f.ofText(translate('style'), this.node.style, {
                        options: X
                    }), f.ofText(translate('decoration'), this.node.decoration, {
                        options: Q
                    })]
                }
            }
        }
          , SpanFormObj = Object(i.a)(SpanForm, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "form-pane"
                }
            }, [o("div", [o("div", [o("h1", [e._v(translate('Span'))]), e._v(" "), o("div", [o("form", e._l(e.fields, (function(t) {
                return o("FieldView", {
                    key: t.name,
                    attrs: {
                        id: e.node.id,
                        field: t
                    }
                })
            }
            )), 1)])])])])
        }
        ), [], !1, null, null, null).exports
          , Se = {
            name: "FormPane",
            components: {
                ButtonForm: ButtonFormObj,
                BubbleForm: BubbleFormObj,
                CarouselForm: CarouselFormObj,
                BlockForm: BlockFormObj,
                BoxForm: BoxFormObj,
                TextForm: TextFormObj,
                ImageForm: ImageFormObj,
                //20220811
                    VideoForm: VideoFormObj,
                //--
                IconForm: IconFormObj,
                SeparatorForm: SeparatorFormObj,
                FillerForm: FillerFormObj,
                SpacerForm: SpacerFormObj,
                SpanForm: SpanFormObj,
            },
            computed: {
                node() {
                    return this.$store.getters.getSelectedNode
                }
            }
        }
          , Be = Object(i.a)(Se, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return e.node && "header" === e.node.type || e.node && "hero" === e.node.type || e.node && "body" === e.node.type || e.node && "footer" === e.node.type ? o("BlockForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "box" === e.node.type ? o("BoxForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "bubble" === e.node.type ? o("BubbleForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "carousel" === e.node.type ? o("CarouselForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "button" === e.node.type ? o("ButtonForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "filler" === e.node.type ? o("FillerForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "icon" === e.node.type ? o("IconForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "image" === e.node.type ? o("ImageForm", {
                attrs: {
                    node: e.node
                }
            //20220811
                }) : e.node && "video" === e.node.type ? o("VideoForm", {
                    attrs: {
                        node: e.node
                    }
            //--
            }) : e.node && "separator" === e.node.type ? o("SeparatorForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "spacer" === e.node.type ? o("SpacerForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "text" === e.node.type ? o("TextForm", {
                attrs: {
                    node: e.node
                }
            }) : e.node && "span" === e.node.type ? o("SpanForm", {
                attrs: {
                    node: e.node
                }
            }) : o("div", {
                attrs: {
                    id: "form-pane"
                }
            })
        }
        ), [], !1, null, null, null).exports
          , Re = {
            name: "CommandPane",
            computed: {
                id() {
                    return this.$store.getters.getSelectedNodeId
                },
                ids() {
                    return this.$store.getters.getMultiSelectedNodeIds
                },
                singleSelectionMode() {
                    return this.node && 1 === this.ids.length
                },
                node() {
                    const e = this.$store.getters.getSelectedNode;
                    return e ? l.of(e) : null
                },
                nodes() {
                    return this.ids.map(e=>this.$store.getters.getById(e)).map(e=>l.of(e))
                },
                clipboard() {
                    return this.$store.getters.getClipboard
                },
                isRemovable() {
                    return this.nodes && this.nodes.every(e=>e.isRemovable)
                },
                isAddable() {
                    return this.singleSelectionMode && this.node.isAddable
                },
                addableTypes() {
                    return this.node && this.node.addableTypes
                },
                canCopy() {
                    return this.nodes && this.nodes.every(e=>e.canCopy)
                },
                canCut() {
                    return this.nodes && this.nodes.every(e=>e.canCopy && e.isRemovable)
                },
                canPaste() {
                    return !!(this.singleSelectionMode && this.node.isAddable && this.clipboard.length > 0) && this.clipboard.every(e=>this.node.addableTypes.includes(e.type))
                },
                canMove() {
                    return this.singleSelectionMode && this.node.canMove
                },
                canUndo() {
                    return this.$store.getters.canUndo
                },
                canRedo() {
                    return this.$store.getters.canRedo
                }
            },
            methods: {
                removeNode() {
                    this.$store.commit("removeNode", {
                        ids: this.ids
                    })
                },
                addNode(e) {
                    this.$store.commit("addNode", {
                        parentId: this.id,
                        type: e
                    })
                },
                move(e) {
                    this.$store.commit("move", {
                        id: this.id,
                        direction: e
                    })
                },
                copy() {
                    this.$store.commit("copyNode", {
                        ids: this.ids
                    })
                },
                cut() {
                    this.$store.commit("cutNode", {
                        ids: this.ids
                    })
                },
                paste() {
                    this.$store.commit("pasteNode", {
                        parentId: this.id
                    })
                },
                undo() {
                    this.$store.commit("undo")
                },
                redo() {
                    this.$store.commit("redo")
                }
            }
        }
          , Ee = Object(i.a)(Re, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "command-pane"
                }
            }, [o("b-dropdown", {
                attrs: {
                    size: "sm",
                    variant: "primary",
                    disabled: !e.isAddable
                }
            }, [o("template", {
                slot: "button-content"
            }, [o("i", {
                staticClass: "fa fa-plus"
            })]), e._v(" "), e._l(e.addableTypes, (function(t) {
                return o("b-dropdown-item", {
                    key: t,
                    on: {
                        click: function(o) {
                            return e.addNode(t);
                        }
                    }
                }, [e._v( e._s(e.$t(t)) )])
            }
            ))], 2), e._v(" "), o("div", {
                staticClass: "btn-group btn-group-sm"
            }, [o("button", {
                staticClass: "btn btn-secondary",
                attrs: {
                    type: "button",
                    disabled: !e.canMove
                },
                on: {
                    click: function(t) {
                        return e.move(-1)
                    }
                }
            }, [o("i", {
                staticClass: "fa fa-chevron-up"
            })]), e._v(" "), o("button", {
                staticClass: "btn btn-secondary",
                attrs: {
                    type: "button",
                    disabled: !e.canMove
                },
                on: {
                    click: function(t) {
                        return e.move(1);
                    }
                }
            }, [o("i", {
                staticClass: "fa fa-chevron-down"
            })])]), e._v(" "), o("div", {
                staticClass: "btn-group btn-group-sm"
            }, [o("button", {
                staticClass: "btn btn-secondary",
                attrs: {
                    type: "button",
                    disabled: !e.canCopy
                },
                on: {
                    click: e.copy
                }
            }, [o("i", {
                staticClass: "fa fa-files-o"
            })]), e._v(" "), o("button", {
                staticClass: "btn btn-secondary",
                attrs: {
                    type: "button",
                    disabled: !e.canCut
                },
                on: {
                    click: e.cut
                }
            }, [o("i", {
                staticClass: "fa fa-scissors"
            })]), e._v(" "), o("button", {
                staticClass: "btn btn-secondary",
                attrs: {
                    type: "button",
                    disabled: !e.canPaste
                },
                on: {
                    click: e.paste
                }
            }, [o("i", {
                staticClass: "fa fa-clipboard"
            })])]), e._v(" "), o("div", {
                staticClass: "btn-group btn-group-sm"
            }, [o("button", {
                staticClass: "btn btn-secondary",
                attrs: {
                    type: "button",
                    disabled: !e.canUndo
                },
                on: {
                    click: e.undo
                }
            }, [o("i", {
                staticClass: "fa fa-undo"
            })]), e._v(" "), o("button", {
                staticClass: "btn btn-secondary",
                attrs: {
                    type: "button",
                    disabled: !e.canRedo
                },
                on: {
                    click: e.redo
                }
            }, [o("i", {
                staticClass: "fa fa-repeat"
            })])]), e._v(" "), o("div", {
                staticClass: "btn-group btn-group-sm"
            }, [o("button", {
                staticClass: "btn btn-danger",
                attrs: {
                    type: "button",
                    disabled: !e.isRemovable
                },
                on: {
                    click: e.removeNode
                }
            }, [o("i", {
                staticClass: "fa fa-times"
            })])])], 1)
        }
        ), [], !1, null, null, null).exports
          , Ie = [function() {
            var e = this.$createElement
              , t = this._self._c || e;
            return t("div", {
                staticClass: "logo"
            }, [t("img", {
                attrs: {
                    src: o(26)
                }
            })])
        }
        ]
          , Ne = {
            name: "EditorModal",
            props: {
                value: Boolean
            },
            data: ()=>({
                show: !1,
                json: ""
            }),
            computed: {
                flex() {
                    return this.$store.getters.getAsFlex
                }
            },
            watch: {
                value(e) {
                    this.show = e
                },
                show(e) {
                    this.$emit("input", e)
                },
                flex() {
                    this.reset()
                }
            },
            methods: {
                change(e) {
                    this.json = e
                },
                reset() {
                    const e = this.$store.getters.getAsFlex;
                    this.json = null !== e ? JSON.stringify(e, null, "  ") : ""
                },
                copy() {
                    const e = document.querySelector("#editor");
                    e.select(),
                    document.execCommand("copy"),
                    e.blur(),
                    this.$refs.tooltipCopied.$emit("open");
                    const t = this.$refs.tooltipCopied;
                    setTimeout((function() {
                        t.$emit("close")
                    }
                    ), 2e3)
                },
                close() {
                    this.show = !1,
                    this.reset()
                },
                apply() {
                    try {
                        this.$store.commit("initTree", JSON.parse(this.json))
                    } catch (e) {
                        this.$store.commit("setMessages", [{
                            text: "invalid json",
                            level: "error"
                        }]),
                        console.error(e)
                    }
                    this.show = !1
                }
            }
        }
          , Ae = Object(i.a)(Ne, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("b-modal", {
                attrs: {
                    size: "lg",
                    "hide-header": !0,
                    "no-fade": !0,
                    title: "JSON"
                },
                model: {
                    value: e.show,
                    callback: function(t) {
                        e.show = t
                    },
                    expression: "show"
                }
            }, [o("form", [o("textarea", {
                attrs: {
                    id: "editor"
                },
                domProps: {
                    value: e.json
                },
                on: {
                    change: function(t) {
                        return e.change(t.target.value);
                    },
                    click: function(t) {
                        return e.change(t.target.value);
                    }
                }
            })]), e._v(" "), o("div", [o("a", {
                staticClass: "link-json-spec",
                attrs: {
                    href: "https://developers.line.biz/en/docs/messaging-api/using-flex-messages/",
                    target: "_blank"
                }
            }, [e._v( e._s(e.$t("json_spec")) )])]), e._v(" "), o("div", {
                attrs: {
                    slot: "modal-footer"
                },
                slot: "modal-footer"
            }, [o("button", {
                staticClass: "btn btn-outline-primary",
                attrs: {
                    type: "button",
                    id: "copyButton"
                },
                on: {
                    click: e.copy
                }
            }, [e._v( e._s(e.$t("copy")) )]), e._v(" "), o("b-tooltip", {
                ref: "tooltipCopied",
                attrs: {
                    target: "copyButton",
                    triggers: ""
                }
            }, [o("strong", [e._v( e._s(e.$t("copied")) )])]), e._v(" "), o("button", {
                staticClass: "btn btn-secondary",
                attrs: {
                    type: "button"
                },
                on: {
                    click: e.close
                }
            }, [e._v( e._s(e.$t("close")) )]), e._v(" "), o("button", {
                staticClass: "btn btn-primary",
                attrs: {
                    id: "ApplyFlex",
                    type: "button"
                },
                on: {
                    click: e.apply
                }
            }, [e._v( e._s(e.$t("apply")) )])], 1)])
        }), [], !1, null, null, null).exports
          , Me = {
            name: "HeaderPane",
            components: {
                EditorModal: Ae
            },
            data: ()=>({
                locale: "en",
                showEditorModal: !1
            }),
            computed: {
                samples() {
                    return this.$store.state.samples;
                }
            },
            methods: {
                reset(e) {
                    this.$store.dispatch("doReset", e);
                },
                doLoadSample(e) {
                    this.$store.dispatch("doLoadSample", e);
                },
                openEditor() {
                    this.showEditorModal = !0;
                }
            },
            watch: {
                locale(e) {
                    this.$i18n.locale = e;
                }
            }
        }
          , Pe = (o(27),
        Object(i.a)(Me, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                staticClass: "header-root"
            }, [e._m(0), e._v(" "), o("a", {
                staticClass: "link-to-top-page",
                attrs: {
                    href: "/"
                }
            }, [e._v( e._s(e.$t("back_to_home")) )]), e._v(" "), o("div", {
                staticClass: "language-selector"
            }, [o("select", {
                directives: [{
                    name: "model",
                    rawName: "v-model",
                    value: e.locale,
                    expression: "locale"
                }],
                on: {
                    change: function(t) {
                        var o = Array.prototype.filter.call(t.target.options, (function(e) {
                            return e.selected;
                        })).map((function(e) {
                            return "_value"in e ? e._value : e.value;
                        }));
                        e.locale = t.target.multiple ? o : o[0];//en、zh-TW、ja
                        document.querySelector('#ApplyFlex').click();
                    }
                }
            }, [
                o("option", {
                    attrs: {
                        value: "en"
                    }
                }, [e._v("English")]),
                e._v(" "),
                o("option", {
                    attrs: {
                        value: "zh-TW"
                    }
                }, [e._v("中文")]),
                // //20220811
                //     e._v(" "),
                //     o("option", {
                //         attrs: {
                //             value: "ja"
                //         }
                //     }, [e._v("日本語")])
                // //--
            ])])]);
        }
        ), Ie, !1, null, "7e1dc84b", null).exports)
          , Ge = {
            name: "ShowcaseModal",
            props: {
                value: Boolean
            },
            data: ()=>({
                show: !1,
                selectedSampleId: ""
            }),
            computed: {
                samples() {
                    return this.$store.state.samples
                }
            },
            watch: {
                value(e) {
                    this.show = e
                },
                show(e) {
                    this.$emit("input", e)
                }
            },
            methods: {
                selectSample(e) {
                    this.selectedSampleId = e.currentTarget.dataset.sampleId
                },
                create() {
                    this.show = !1,
                    this.doLoadSample(this.selectedSampleId)
                },
                close() {
                    this.show = !1
                },
                doLoadSample(e) {
                    this.$store.dispatch("doLoadSample", e)
                }
            }
        }
          , Ve = (o(28),
        {
            name: "MenuPane",
            components: {
                EditorModal: Ae,
                ShowcaseModal: Object(i.a)(Ge, (function() {
                    var e = this
                      , t = e.$createElement
                      , o = e._self._c || t;
                    return o("b-modal", {
                        attrs: {
                            size: "lg",
                            "hide-header": !0,
                            "no-fade": !0,
                            centered: !0,
                            title: "Showcase"
                        },
                        model: {
                            value: e.show,
                            callback: function(t) {
                                e.show = t
                            },
                            expression: "show"
                        }
                    }, [o("div", {
                        staticClass: "modal-body"
                    }, [o("p", {
                        staticClass: "has-text-bold"
                    }, [e._v( e._s(e.$t("example")) )]), e._v(" "), o("div", {
                        staticClass: "samples"
                    }, [o("b-container", [o("b-row", e._l(e.samples, (function(t) {
                        return o("b-col", {
                            key: t.id,
                            staticClass: "sample-item",
                            class: {
                                selected: e.selectedSampleId === t.id
                            },
                            attrs: {
                                cols: "6",
                                sm: "6",
                                md: "6",
                                lg: "4",
                                "data-sample-id": t.id
                            },
                            on: {
                                click: function(t) {
                                    return e.selectSample(t)
                                }
                            }
                        }, [o("div", {
                            staticClass: "thumb"
                        }, [o("b-img", {
                            attrs: {
                                src: t.pictureUrl,
                                fluid: ""
                            }
                        })], 1), e._v(" "), o("div", {
                            staticClass: "label"
                        }, [e._v("\n              " + e._s(t.title) + "\n            ")])])
                    }
                    )), 1)], 1)], 1)]), e._v(" "), o("div", {
                        attrs: {
                            slot: "modal-footer"
                        },
                        slot: "modal-footer"
                    }, [o("button", {
                        staticClass: "btn btn-secondary",
                        attrs: {
                            type: "button",
                            id: "ShowcaseCancelBtn",
                        },
                        on: {
                            click: e.close
                        }
                    }, [e._v( e._s(e.$t("cancel")) )]), e._v(" "), o("button", {
                        staticClass: "btn btn-primary",
                        attrs: {
                            type: "button",
                            id: "ShowcaseCreateBtn",
                        },
                        on: {
                            click: function(t) {
                                return e.create()
                            }
                        }
                    }, [e._v( e._s(e.$t("create")) )])])])
                }), [], !1, null, "597ba6dc", null).exports,
                TestMessageModal: Object(i.a)({
                    name: "TestMessageModal",
                    props: {
                        value: Boolean
                    },
                    data: ()=>({
                        show: !1,
                        Qrcode: "",
                        FileName: "",
                    }),
                    computed: {
                        
                    },
                    watch: {
                        value(e) {
                            this.show = e;
                        },
                        show(e) {
                            if(this.show){
                                document.querySelector('#QrcodeImg').style.display = 'none';
                                document.querySelector('#QrcodeImg').src = '';
                                document.querySelector('#ScanTextSmall').style.display = 'none';
                                document.querySelector('#ScanText').style.display = 'block';
                                document.querySelector('#GenerateQRcode').style.display = 'inline-block';
                                document.querySelector('#GenerateQRcode').removeAttribute('disabled');
                                document.querySelector('#ScanTextSmall').innerHTML = translate("Scan this QR code in your LINE app.");
                            }
                            this.$emit("input", e);
                        }
                    },
                    methods: {
                        close() {
                            this.show = !1;
                        },
                        CreateQrcode() {
                            document.querySelector('#GenerateQRcode').setAttribute('disabled', true);
                            fetch(`${Ze}/v1/fx/qrcode`, {
                                method: "POST", 
                                body: JSON.stringify(JSON.parse(document.querySelector('#editor').value))
                            }).then((response) => {
                                return response.json(); 
                            }).then((jsonData) => {
                                if(jsonData.status){
                                    var This = this;
                                    This.Qrcode = jsonData.qrcode;
                                    This.FileName = jsonData.filename;
                                    document.querySelector('#QrcodeImg').style.display = 'inline-block';
                                    document.querySelector('#QrcodeImg').src = This.Qrcode;
                                    document.querySelector('#ScanTextSmall').style.display = 'block';
                                    document.querySelector('#ScanText').style.display = 'none';
                                    document.querySelector('#GenerateQRcode').style.display = 'none';
                                    This['CheckQrcodeStartTime'+jsonData.filename] = new Date().getTime();
                                    var CheckTime = 2;//每2秒檢查一次圖片是否失效
                                    var MaxTime = 60;//倒數60秒
                                    This['CheckQrcodeInterval'+jsonData.filename] = window.setInterval(function() {
                                        var ExeTime = Math.round((new Date().getTime()-This['CheckQrcodeStartTime'+jsonData.filename])/1000);
                                        document.querySelector('#ScanTextSmall').innerHTML = translate("Scan this QR code in your LINE app.") +" "+ (MaxTime-ExeTime) +" "+ translate("seconds");
                                        
                                        if(!This.show || ExeTime>=MaxTime){
                                            window.clearInterval(This['CheckQrcodeInterval'+jsonData.filename]);
                                            if(This.show){
                                                This.close();
                                                This.$store.commit("setMessages", [{
                                                    text: "QRcode expired"
                                                }]);
                                            }
                                        }else if((ExeTime%CheckTime) === 0){
                                            This.CheckFileUrl(jsonData.filename);
                                        }
                                    }, 1000);//每秒執行一次
                                }else{
                                    this.$store.commit("setMessages", [{
                                        text: "Please try again."
                                    }]);
                                }
                            }).catch((err) => {
                                console.log('錯誤:', err);
                            })
                        },
                        CheckFileUrl(filename){
                            var This = this;
                            fetch(`/upload/contentId/${filename}?v=${new Date().getTime()}`, {
                                method: "GET"
                            }).then((res) => {
                                if(!res.ok){ //圖片失效
                                    This.close();
                                    window.clearInterval(This['CheckQrcodeInterval'+filename]);
                                    This.$store.commit("setMessages", [{
                                        text: "Message Sent",
                                        level: "success"
                                    }]);
                                }
                            });
                        },
                    }
                }, (function() {
                    var e = this
                      , t = e.$createElement
                      , o = e._self._c || t;
                    return o("b-modal", {
                        attrs: {
                            size: "md",
                            "hide-header": !1,
                            "no-fade": !0,
                            centered: !0,
                            title: e.$t("Test Message"),
                        },
                        model: {
                            value: e.show,
                            callback: function(t) {
                                e.show = t;
                                if(!e.show && e.FileName){
                                    fetch(`${Ze}/v1/fx/delfile`, {
                                        method: "POST", 
                                        body: JSON.stringify({
                                            filename: e.FileName
                                        })
                                    }).then((response) => {
                                        return response.json(); 
                                    }).then((jsonData) => {
                                        
                                    }).catch((err) => {
                                        console.log('錯誤:', err);
                                    });
                                }
                            },
                            expression: "show"
                        }
                    }, [
                        o("div", {
                            staticClass: "modal-body"
                        }, [o("div", {
                                staticStyle: {
                                    "text-align": "center"
                                }
                            }, [
                                o("img", {
                                    attrs: {
                                        id: "QrcodeImg",
                                        src: e.Qrcode,
                                        width: "128",
                                        height: "128",
                                    },
                                })
                                , e._v(" ")
                                ,o("div", {
                                    staticClass: "figure-caption text-black-50"
                                }, [
                                    o("p", { attrs:{ id: "ScanTextSmall" } }, [e._v(e._s(e.$t("Scan this QR code in your LINE app.")))])
                                ])
                                , e._v(" ")
                                , o("p", { attrs:{ id: "ScanText" } }, [e._v(e._s(e.$t("Click the button below to generate a test QRcode.")))])
                                , e._v(" ")
                                ,o("div", {
                                    staticClass: "figure-caption text-black-50"
                                }, [
                                    o("button", {
                                        staticClass: "btn btn-success",
                                        attrs: {
                                            type: "button",
                                            id: "GenerateQRcode",
                                        },
                                        on: {
                                            click: function(t) {
                                                return e.CreateQrcode();
                                            }
                                        }
                                    }, [e._v( e._s(e.$t("Generate QRcode")) )])
                                ])
                            ])], 1)
                        , e._v(" ")
                        , o("div", {
                            attrs: {
                                slot: "modal-footer"
                            },
                            slot: "modal-footer"
                        }, [o("button", {
                            staticClass: "btn btn-secondary",
                            attrs: {
                                type: "button"
                            },
                            on: {
                                click: e.close
                            }
                        }, [e._v( e._s(e.$t("cancel")) )])])
                    ])
                }), [], !1, null, null, null).exports,
            },
            data: ()=>({
                showEditorModal: !1,
                showShowcaseModal: !1,
                //20220811
                    showTestMessageModal: !1,
                //--
            }),
            computed: {
                samples() {
                    return this.$store.state.samples
                }
            },
            methods: {
                reset(e) {
                    this.$store.dispatch("doReset", e)
                },
                doLoadSample(e) {
                    this.$store.dispatch("doLoadSample", e)
                },
                openEditor() {
                    this.showEditorModal = !0
                },
                openShowcase() {
                    this.showShowcaseModal = !0
                },
                //20220811
                    openTestMessage() {
                        this.showTestMessageModal = !0
                    },
                //--
            }
        })
          , ze = Object(i.a)(Ve, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", [
                o("b-dropdown", {
                    attrs: {
                        text: e._s(e.$t("addBtn")),
                        variant: "primary"
                    }
                },
                [
                    o("b-dropdown-item", {
                        key: "bubble",
                        on: {
                            click: function(t) {
                                return e.reset("bubble")
                            }
                        }
                    }, [e._v( e._s(e.$t("bubble")) )]),
                    e._v(" "),
                    o("b-dropdown-item", {
                        key: "carousel",
                        on: {
                            click: function(t) {
                                return e.reset("carousel");
                            }
                        }
                    },
                    [e._v( e._s(e.$t("carousel")) )])
                ], 1),
                e._v(" "),
                o("div", {
                    staticClass: "btn-group"
                }, [
                    o("button", {
                        staticClass: "btn btn-secondary",
                        attrs: {
                            type: "button",
                            id: "FlexSamples"
                        },
                        on: {
                            click: e.openShowcase
                        }
                    },
                    [e._v( e._s(e.$t("example")) )])
                ]),
                //20220811
                    e._v(" "),
                    o("div", {
                        staticClass: "btn-group",
                        attrs: {
                            id: "TestMsgBtn"
                        }
                    },
                    [
                        o("button", {
                            staticClass: "btn btn-secondary",
                            attrs: {
                                type: "button"
                            },
                            on: {
                                click: e.openTestMessage
                            }
                        }, 
                        [
                            o("i", {
                                staticClass: "fab fa-line"
                            }), 
                            e._v( e._s(e.$t('Test')) )
                        ])
                    ]),
                //--
                e._v(" "),
                o("div", {
                    staticClass: "btn-group",
                    attrs: {
                        id: "FlexJson"
                    }
                },
                [
                    o("button", {
                        staticClass: "btn btn-secondary",
                        attrs: {
                            type: "button"
                        },
                        on: {
                            click: e.openEditor
                        }
                    }, 
                    [
                        o("i", {
                            staticClass: "fa fa-code"
                        }), 
                        e._v( e._s(e.$t("json")) )
                    ])
                ]),
                e._v(" "),
                o("EditorModal", {
                    model: {
                        value: e.showEditorModal,
                        callback: function(t) {
                            e.showEditorModal = t;
                        },
                        expression: "showEditorModal"
                    }
                }),
                e._v(" "),
                o("ShowcaseModal", {
                    model: {
                        value: e.showShowcaseModal,
                        callback: function(t) {
                            e.showShowcaseModal = t
                        },
                        expression: "showShowcaseModal"
                    }
                }),
                //20220811
                    e._v(" "),
                    o("TestMessageModal", {
                        model: {
                            value: e.showTestMessageModal,
                            callback: function(t) {
                                e.showTestMessageModal = t
                            },
                            expression: "showTestMessageModal"
                        }
                    }),
                //--
            ], 1)
        }
        ), [], !1, null, null, null).exports
          , Ue = o(13)
          , qe = o(3)
          , Le = o.n(qe);
        class He {
            constructor({withId: e}={}) {
                this.withId = e || !1
            }
            handleCarousel(e) {
                if (!e)
                    throw new Error(`unexpected data: ${e}`);
                return {
                    type: "carousel",
                    contents: e.children.map(e=>this.handleBubble(e))
                }
            }
            handleBubble(e) {
                if (!e)
                    throw new Error(`unexpected data: ${e}`);
                const t = {
                    type: "bubble"
                }
                  , o = {};
                return Object.keys(e).forEach(n=>{
                    "id" === n || "root" === n || ("children" === n ? e.children.forEach(e=>{
                        const n = e.type
                          , s = e.children;
                        Array.isArray(s) && 1 === s.length && (t[n] = this.handleComponent(s[0])),
                        Object.keys(e.style).length > 0 && (o[n] = e.style)
                    }
                    ) : t[n] = e[n])
                }
                ),
                Object.keys(o).length > 0 && (t.styles = o),
                t
            }
            handleComponent(e) {
                if (!e)
                    throw new Error(`unexpected data: ${e}`);
                const t = e.type;
                if (!t)
                    throw new Error(`unexpected component type: ${t}`);
                const o = {};
                return Object.keys(e).forEach(n=>{
                    if("id"!==n || this.withId){
                        if("children" === n){
                            if("video" === t){ //20220811
                                if(e.children && 1===e.children.length){
                                    o.altContent = this.handleComponent(e.children[0]) 
                                }else{
                                    o.altContent = NULL;
                                }
                            }else{
                                o.contents = e.children.map(e=>this.handleComponent(e));
                            }
                        }else{
                            o[n] = e[n];
                        }
                    }
                }
                ),
                o
            }
            convert(e) {
                if (!e)
                    throw new Error(`unexpected data: ${e}`);
                switch (e.type) {
                case "carousel":
                    return this.handleCarousel(e);
                case "bubble":
                    return this.handleBubble(e);
                default:
                    return this.handleComponent(e)
                }
            }
        }
        var De = o(21)
          , Je = o.n(De);
        class We {
            constructor({idgen: e}={}) {
                this.idgen = e || Je.a
            }
            handleBlock(e, t) {
                let o = {};
                return t.styles && t.styles[e] && (o = t.styles[e]),
                {
                    type: e,
                    id: this.idgen(),
                    style: o,
                    children: t[e] ? [this.handleComponent(t[e])] : []
                }
            }
            handleCarousel(e) {
                if (!e)
                    throw new Error(`unexpected data: ${e}`);
                return {
                    type: "carousel",
                    id: this.idgen(),
                    root: !0,
                    children: e.contents.map(e=>this.handleBubble(e))
                }
            }
            handleBubble(e) {
                if (!e)
                    throw new Error(`unexpected data: ${e}`);
                return {
                    type: "bubble",
                    size: e.size,
                    direction: e.direction,
                    id: this.idgen(),
                    root: !1,
                    children: ["header", "hero", "body", "footer"].map(t=>this.handleBlock(t, e))
                }
            }
            handleComponent(e) {
                if (!e)
                    throw new Error(`unexpected data: ${e}`);
                const t = e.type;
                if (!t)
                    throw new Error(`unexpected component type: ${t}`);
                const o = {
                    id: this.idgen()
                };
                return Object.keys(e).forEach(t=>{
                    if("contents" === t){
                        o.children = e.contents.map(e=>this.handleComponent(e));
                    }else if("altContent" === t){ //20220811
                        o.children = [this.handleComponent(e.altContent)];
                    }else{
                        o[t] = e[t];
                    }
                }),
                o
            }
            convert(e, t=!1) {
                if (!e)
                    throw new Error(`unexpected data: ${e}`);
                switch (e.type) {
                case "carousel":
                    return this.handleCarousel(e);
                case "bubble":
                    const o = this.handleBubble(e);
                    return o.root = t,
                    o;
                default:
                    return this.handleComponent(e)
                }
            }
        }
        function Ke(e, t) {
            const o = e.shift();
            switch (o) {
            case "contents":
                {
                    const n = parseInt(e.shift());
                    return n >= 0 ? Ke(e, t.children[n]) : {
                        node: t,
                        property: o
                    }
                }
            case "style":
            case "background":
            case "action":
                return {
                    node: t,
                    property: e.shift(),
                    parent: o
                };
            default:
                return {
                    node: t,
                    property: o
                }
            }
        }
        function Xe(e, t) {
            switch (Array.isArray(e) || (e = e.split("/").filter(e=>e.length > 0)),
            t.type) {
            case "carousel":
                return function(e, t) {
                    const o = e.shift();
                    if ("contents" === o) {
                        const o = parseInt(e.shift());
                        if (o >= 0)
                            return Xe(e, t.children[o])
                    }
                    return {
                        node: t,
                        property: o
                    }
                }(e, t);
            case "bubble":
                return function(e, t) {
                    const o = e.shift();
                    switch (o) {
                    case "styles":
                    //case "action":
                        {
                            //20220811
                                const o = e.shift();
                                e.unshift(o);//"style"
                                return Ke(e, t.children.find(e=>e.type === o))
                            //--
                            
                            // //舊的
                            //     const o = e.shift();
                            //     return e.unshift(o),//"style"
                            //     Ke(e, t.children.find(e=>e.type === o))
                            // //--
                        }
                    case "header":
                    case "hero":
                    case "body":
                    case "footer":
                        return Ke(e, t.children.find(e=>e.type === o).children[0]);
                    default:
                        return {
                            node: t,
                            property: o
                        }
                    }
                }(e, t);
            default:
                return Ke(e, t)
            }
        }
        var Qe = {
            findByPath: Xe
        };
        class Ye {
            constructor(e, t={}) {
                this.root = function e(t) {
                    if (!t)
                        return null;
                    const o = Object.assign({}, t);
                    return function(e) {
                        let t = e.type;
                        return "header" === t || "hero" === t || "body" === t || "footer" === t
                    }(t) && (o.style = e(t.style)),
                    t.children && (o.children = t.children.map(t=>e(t))),
                    t.action && (o.action = e(t.action)),
                    o
                }(e),
                this.flexToTree = new We(t)
            }
            getRoot() {
                return this.root
            }
            findById(e) {
                return function e(t, o) {
                    if (!t)
                        return null;
                    if (t.id === o)
                        return t;
                    if (t.children)
                        for (const n of t.children) {
                            const t = e(n, o);
                            if (null != t)
                                return t
                        }
                    return null
                }(this.root, e)
            }
            findByPath(e) {
                return Qe.findByPath(e, this.root)
            }
            addNode(e, t) {
                const o = this.findById(e);
                if (null == o)
                    console.error("node not found");
                else {
                    const e = this.flexToTree.convert(t);
                    Array.isArray(o.children) ? o.children.push(e) : o.children = [e]
                }
            }
            removeNode(e) {
                !function e(t, o) {
                    return t ? t.id === o ? null : (t.children && (t.children = t.children.map(t=>e(t, o)).filter(e=>null != e)),
                    t) : null
                }(this.root, e)
            }
            moveNode(e, t) {
                !function e(t, o, n) {
                    if (!t)
                        return null;
                    if (t.id === o)
                        return t;
                    if (t.children) {
                        const s = t.children;
                        let r = -1;
                        if (s.forEach((t,s)=>{
                            null != e(t, o, n) && (r = s)
                        }
                        ),
                        r >= 0) {
                            const e = r + (n > 0 ? 1 : -1);
                            e >= 0 && e < s.length && ([s[r],s[e]] = [s[e], s[r]])
                        }
                    }
                    return null
                }(this.root, e, t)
            }
        }
        const Ze = "/ft/api"
          , et = "developers.line.biz" === window.location.hostname ? "https://account.line.biz/login" : "https://account.line-beta.biz/login";
        n.a.use(Ue.a),
        Le.a.defaults.timeout = 6e4,
        Le.a.defaults.withCredentials = !0,
        Le.a.defaults.xsrfHeaderName = "X-CSRF-Token",
        Le.a.defaults.headers["X-Requested-With"] = "XMLHttpRequest",
        Le.a.defaults.validateStatus = e=>e >= 200 && e < 300 || 401 == e,
        Le.a.interceptors.response.use((function(e) {
            return 401 == e.status && (location.href = `${et}?scope=line&redirectUri=${encodeURIComponent(location.href)}`),
            e
        }
        ), (function(e) {
            return Promise.reject(e)
        }
        ));
        var tt = new Ue.a.Store({
            state: {
                selectedNodeId: "",
                multiSelectedNodeIds: [],
                hoveredNodeId: "",
                tree: {},
                clipboard: [],
                samples: [],
                messages: [],
                undo: [],
                redo: [],
                html: "",
                containerType: "bubble",
                shareUrl: "",
                //20220811
                    destinations: [],
                //--
            },
            mutations: {
                setRenderResult(e, {html: t, containerType: o}) {
                    e.html = t,
                    e.containerType = o
                },
                clearRenderResult(e) {
                    e.html = "",
                    e.containerType = "bubble"
                },
                setMessages(e, t) {
                    e.messages = t
                },
                //20220811
                    initDestinations(e, t) {
                        e.destinations = t
                    },
                //--
                initTree(e, t) {
                    Object.keys(e.tree).length > 0 && (e.undo.push(e.tree),
                    e.redo = []),
                    e.selectedNodeId = "",
                    e.multiSelectedNodeIds = [],
                    e.tree = (new We).convert(t, !0)
                },
                updateProperty(e, {id: t, property: o, value: n, parent: s}) {                    
                    const   r = new Ye(e.tree),
                            i = r.findById(t);
                    if(i){
                        console.log(o);
                        o = translate(o, true);
                        if(s){
                            console.log(`property set: ${s}#${o} = ${n}`);
                            i[s][o] = n;
                        }else{
                            console.log(`property set: ${o} = ${n}`);
                            i[o] = n;
                        }
                        e.undo.push(e.tree);
                        e.redo = [];
                        e.tree = r.getRoot();
                    }else{
                        console.error("target node not found: " + t);
                    }
                },
                deleteProperty(e, {id: t, property: o, parent: n}) {
                    const   s = new Ye(e.tree),
                            r = s.findById(t);
                    if(r){
                        o = translate(o, true);
                        if(n){
                            console.log(`property deleted: ${n}#${o}`);
                            delete r[n][o];
                        }else{
                            console.log(`property deleted: ${o}`);
                            delete r[o];
                        }
                        e.undo.push(e.tree);
                        e.redo = [];
                        e.tree = s.getRoot();
                    }else{
                        console.error("target node not found: " + t);
                    }
                },
                setSamples(e, t) {
                    e.samples = t
                },
                setSelectedNodeId(e, t) {
                    e.selectedNodeId = t,
                    e.multiSelectedNodeIds = [t]
                },
                addSelectedNodeId(e, t) {
                    e.selectedNodeId = "",
                    e.multiSelectedNodeIds.push(t)
                },
                removeSelectedNodeId(e, t) {
                    e.selectedNodeId === t && (e.selectedNodeId = ""),
                    e.multiSelectedNodeIds = e.multiSelectedNodeIds.filter(e=>e !== t)
                },
                setHoveredNodeId(e, t) {
                    e.hoveredNodeId = t
                },
                addNode(e, {parentId: t, type: o}) {
                    const n = S.of(o);
                    if (n) {
                        const o = new Ye(e.tree);
                        o.addNode(t, n),
                        e.undo.push(e.tree),
                        e.redo = [],
                        e.tree = o.getRoot()
                    } else
                        console.error("unexpected node type: " + o)
                },
                removeNode(e, {ids: t}) {
                    const o = new Ye(e.tree);
                    t.forEach(e=>o.removeNode(e)),
                    e.selectedNodeId = "",
                    e.multiSelectedNodeIds = [],
                    e.undo.push(e.tree),
                    e.redo = [],
                    e.tree = o.getRoot()
                },
                copyNode(e, {ids: t}) {
                    const o = new Ye(e.tree);
                    e.clipboard = t.map(e=>o.findById(e)),
                    e.messages = [{
                        text: "copied!",
                        level: "success"
                    }]
                },
                cutNode(e, {ids: t}) {
                    const o = new Ye(e.tree);
                    e.clipboard = t.map(e=>o.findById(e)),
                    t.forEach(e=>o.removeNode(e)),
                    e.selectedNodeId = "",
                    e.multiSelectedNodeIds = [],
                    e.undo.push(e.tree),
                    e.redo = [],
                    e.tree = o.getRoot()
                },
                pasteNode(e, {parentId: t}) {
                    if (e.clipboard.length > 0) {
                        const o = new Ye(e.tree);
                        e.clipboard.forEach(e=>{
                            o.addNode(t, (new He).convert(e))
                        }
                        ),
                        e.undo.push(e.tree),
                        e.redo = [],
                        e.tree = o.getRoot()
                    }
                },
                move(e, {id: t, direction: o}) {
                    const n = new Ye(e.tree);
                    n.moveNode(t, o),
                    e.undo.push(e.tree),
                    e.redo = [],
                    e.tree = n.getRoot()
                },
                undo(e) {
                    e.undo.length > 0 && (e.redo.push(e.tree),
                    e.tree = e.undo.pop())
                },
                redo(e) {
                    e.redo.length > 0 && (e.undo.push(e.tree),
                    e.tree = e.redo.pop())
                },
                setShareUrl(e, t) {
                    e.shareUrl = t
                }
            },
            actions: {
                //20220811
                    async doGetSession(e) {
                        try {
                            if (!(await He.a.get(`${Ze}/v1/fx/session`)).data.account) {
                                const e = new URLSearchParams;
                                e.append("redirect", location.pathname + location.search),
                                location.href = `${location.protocol}//${location.host}/console/register?${e.toString()}`
                            }
                        } catch (t) {
                            console.error(error),
                            e.commit("setMessages", [{
                                text: "failed to retrieve session"
                            }]);
                        }
                    },
                //--
                doGetSamples: e=>Le.a.get(`${Ze}/v1/fx/samples`).then(t=>{
                    e.commit("setSamples", t.data.samples)
                }).catch(t=>{
                    console.error(t),
                    e.commit("setMessages", [{
                        text: "failed to retrieve samples"
                    }])
                }),
                doRender(e) {
                    e.commit("setMessages", []);
                    const t = e.getters.getAsFlexWithId;
                    return Le.a.post(`${Ze}/v1/fx/render`, t).then(o=>{
                        e.commit("setRenderResult", {
                            // html: o.data,
                            html: GetPreview(o, e.getters.getAsFlex),
                            containerType: t.type
                        }),
                        e.commit("setMessages", [{
                            text: "OK",
                            level: "success"
                        }]);
                    }).catch(t=>{
                        if (console.error(t),
                        e.commit("clearRenderResult"),
                        t.response.data && t.response.data.details) {
                            console.log(t.response);
                            const o = t.response.data.details.map(e=>({
                                path: e.property,
                                text: e.message
                            }));
                            e.commit("setMessages", o);
                        } else {
                            e.commit("setMessages", [{
                                text: "failed to render message"
                            }]);
                        }
                    })
                },
                doLoadSample: (e,t)=>Le.a.get(`${Ze}/v1/fx/samples/${t}`)
                .then(t=>{
                    e.commit("initTree", t.data);
                }).catch(t=>{
                    console.error(t),
                    e.commit("setMessages", [{text:"failed to load preset"}]);
                }),
                doReset(e, t) {
                    e.commit("initTree", S.of(t));
                },
            },
            getters: {
                getMessages: e=>e.messages,
                getTree: e=>e.tree.type ? e.tree : null,
                getMessageDestinations: e=>e.destinations,
                getAsFlex: e=>e.tree.type ? (new He).convert(e.tree) : null,
                getAsFlexWithId: e=>e.tree.type ? new He({
                    withId: !0
                }).convert(e.tree) : null,
                getById: e=>t=>{
                    if (e.tree.type) {
                        return new Ye(e.tree).findById(t);
                    }
                    return null
                }
                ,
                getSelectedNodeId: e=>e.selectedNodeId,
                getMultiSelectedNodeIds: e=>e.multiSelectedNodeIds,
                getHoveredNodeId: e=>e.hoveredNodeId,
                getSelectedNode: (e,t)=>t.getById(e.selectedNodeId),
                getErrors(e) {
                    if (0 === e.messages.length)
                        return [];
                    const t = new Ye(e.tree);
                    return e.messages.filter(e=>!!e.path).map(e=>{
                        const o = t.findByPath(e.path);
                        return o ? Object.assign({}, e, o) : null
                    }
                    ).filter(e=>null != e)
                },
                getClipboard: e=>e.clipboard,
                canUndo: e=>e.undo.length > 0,
                canRedo: e=>e.redo.length > 0,
                getHtml: e=>e.html,
                getContainerType: e=>e.containerType,
                getShareUrl: e=>e.shareUrl
            }
        })
          , ot = o(14);
        o(51),
        o(52),
        o(53),
        o(54);
        n.a.use(s.b),
        n.a.use(s.e),
        n.a.use(s.c),
        n.a.use(s.d),
        n.a.use(s.a),
        n.a.use(s.f),
        n.a.use(ot.a);
        var nt = {
            name: "App",
            i18n: new ot.a({
                locale: "en",
                messages: o(55)
            }),
            components: {
                HeaderPane: Pe,
                InboxPane: a,
                ViewerPane: h,
                TreePane: p,
                FormPane: Be,
                CommandPane: Ee,
                MenuPane: ze
            },
            store: tt,
            mounted() {
                this.$store.watch(e=>e.tree, ()=>{
                    this.$store.dispatch("doRender");
                });
            },
            created() {
                this.$store.dispatch("doGetSamples").then(()=>{
                    this.$store.dispatch("doLoadSample", this.$store.state.samples[0].id);
                });
            }
        }
          , st = (o(56),
        Object(i.a)(nt, (function() {
            var e = this
              , t = e.$createElement
              , o = e._self._c || t;
            return o("div", {
                attrs: {
                    id: "app"
                }
            }, [o("div", {
                attrs: {
                    id: "header"
                }
            }, [o("HeaderPane")], 1), e._v(" "), o("div", {
                attrs: {
                    id: "top-pane"
                }
            }, [o("h1", [e._v( e._s(e.$t("title")) )]), e._v(" "), o("MenuPane")], 1), e._v(" "), o("div", {
                attrs: {
                    id: "main-pane"
                }
            }, [o("div", {
                attrs: {
                    id: "left-pane"
                }
            }, [o("ViewerPane"), e._v(" "), o("InboxPane")], 1), e._v(" "), o("div", {
                attrs: {
                    id: "center-pane"
                }
            }, [o("CommandPane"), e._v(" "), o("TreePane")], 1), e._v(" "), o("FormPane")], 1)])
        }
        ), [], !1, null, "85689d7e", null).exports);
        new n.a({
            el: "#app",
            render: e=>e(st)
        })
    },
    8: function(e, t, o) {},
    9: function(e, t, o) {}
});

$(function () {
    $(document).on('change', '#editor', function(event) {
        var editorVal = $("#editor").val();
        if(editorVal){
            var editorJSON = JSON.parse(editorVal);
            if(editorJSON[0]){
                editorJSON = editorJSON[0];
            }
            if(editorJSON['type']==='flex' && editorJSON['altText'] && editorJSON['contents']){
                $("#editor").val(JSON.stringify(editorJSON['contents']));
                $("#editor").click();
            }
        }
    });
});
    
//class
function Set_margin(obj=null, parent=null, cssKey=null){
    var _class = "";
    var _margin = (parent['layout']==='vertical') ? 'T' : 'L';
    switch(obj['margin']){
        case 'xs':
            _class = ' ExMgn' + _margin + 'Xs';
            break;
        case 'sm':
            _class = ' ExMgn' + _margin + 'Sm';
            break;
        case 'md':
            _class = ' ExMgn' + _margin + 'Md';
            break;
        case 'lg':
            _class = ' ExMgn' + _margin + 'Lg';
            break;
        case 'xl':
            _class = ' ExMgn' + _margin + 'Xl';
            break;
        case 'xxl':
            _class = ' ExMgn' + _margin + 'XXl';
            break;
        case '':
        case undefined:
        case 'none':
            _class = "";
            break;
        default:
            if(cssKey){
                _class = ' '+ cssKey + ':' + obj['margin'] + ';';
            }else{
                _class = '';
            }
            break;
    }
    
    return _class;
}
function Set_size(obj=null, parent=null, cssKey=null, className='Ex'){
    var _class = "";
    if(parent && parent['type']==='text' && parent['size'] && !obj['size']){ //span
        
    }else{
        switch(obj['size']){
            case 'xxs':
                _class = ' '+className+'XXs';
                break;
            case 'xs':
                _class = ' '+className+'Xs';
                break;
            case 'sm':
                _class = ' '+className+'Sm';
                break;
            case 'lg':
                _class = ' '+className+'Lg';
                break;
            case 'xl':
                _class = ' '+className+'Xl';
                break;
            case 'xxl':
                _class = ' '+className+'XXl';
                break;
            case '3xl':
                _class = ' '+className+'3Xl';
                break;
            case '4xl':
                _class = ' '+className+'4Xl';
                break;
            case '5xl':
                _class = ' '+className+'5Xl';
                break;
            case 'full':
                _class = ' '+className+'Full';
                break;
            case '':
            case undefined:
            case 'md':
                _class = ' '+className+'Md';
                break;
            default:
                if(cssKey){
                    _class = ' '+ cssKey + ':' + obj['size'] + ';';
                }else{
                    _class = ' '+className+'Md';
                }
                break;
        }
    }
    
    return _class;
}
function Set_aspectMode(obj=null, parent=null){
    var _class = "";
    switch(obj['aspectMode']){
        case 'cover':
            _class = ' ExCover';
            break;
        default:
        case 'fit':
            _class = ' ExFit';
            break;
    }
    
    return _class;
}
function Set_flex(obj=null, parent=null){
    var _class = "";
    if(obj['flex'] > -1){
        _class = ' fl'+obj['flex'];
    }else if(['text', 'filler'].indexOf(obj['type'])===-1 &&parent['layout']==='baseline'){
        _class = ' fl0';
    }else if(obj['type']==='box' && parent['layout']==='horizontal'){
        var Flag = false;
        if(parent['flex'] > 0){ //上一層flex>0
            Flag = true;
        }
        if(!Flag){
            for (const [key, value] of Object.entries(parent['contents'])) {
                switch(value['type']){
                    case 'filler':
                        if(obj['width']){ //同一層有filler，且有設定width
                            Flag = true;
                        }
                        break;
                    case 'box':
                        if(value['flex'] > 0){ //同一層有box，且flex>0
                            Flag = true;
                        }
                        break;
                }
                if(Flag) break;
            }
        }
        _class = (Flag) ? ' fl0' : '';
    }
    
    return _class;
}
function Set_position(obj=null, parent=null){
    var _class = "";
    if(obj['position'] === 'absolute'){
        _class = ' ExAbs';
    }
    
    return _class;
}
function Set_wrap(obj=null, parent=null){
    var _class = "";
    if(obj['wrap']){
        _class = ' ExWrap';
    }
    
    return _class;
}
function Set_weight(obj=null, parent=null){
    var _class = "";
    if(parent && parent['type']==='text' && parent['weight'] && !obj['weight']){ //span
        
    }else{
        switch(obj['weight']){
            case 'bold':
                _class = ' ExWB';
                break;
            default:
            case 'regular':
                _class = ' ExWR';
                break;
        }
    }
    
    return _class;
}
function Set_align(obj=null, parent=null){
    var _class = "";
    switch(obj['align']){
        default:
        case 'start':
            break;
        case 'end':
            _class = ' ExAlgE';
            break;
        case 'center':
            _class = ' ExAlgC';
            break;
    }
    
    return _class;
}
function Set_alignV2(obj=null, parent=null){
    var _class = "";
    switch(obj['align']){
        case 'start':
            _class = ' algS';
            break;
        case 'end':
            _class = ' algE';
            break;
        default:
        case 'center':
            break;
    }
    
    return _class;
}
function Set_gravity(obj=null, parent=null){
    var _class = "";
    switch(obj['gravity']){
        default:
        case 'top':
            break;
        case 'bottom':
            _class = ' grvB';
            break;
        case 'center':
            _class = ' grvC';
            break;
    }
    
    return _class;
}
function Set_decoration(obj=null, parent=null){
    var _class = "";
    if(parent && parent['type']==='text' && parent['decoration'] && !obj['decoration']){ //span
        
    }else{
        switch(obj['decoration']){
            default:
            case 'none':
                break;
            case 'underline':
                _class = ' ExTxtDecUl';
                break;
            case 'line-through':
                _class = ' ExTxtDecLt';
                break;
        }
    }
    
    return _class;
}
function Set_spacing(obj=null, parent=null, cssKey=null){
    var _class = "";
    switch(obj['spacing']){
        case 'xs':
            _class = ' spcXs';
            break;
        case 'sm':
            _class = ' spcSm';
            break;
        case 'md':
            _class = ' spcMd';
            break;
        case 'lg':
            _class = ' spcLg';
            break;
        case 'xl':
            _class = ' spcXl';
            break;
        case 'xxl':
            _class = ' spcXXl';
            break;
        case '':
        case undefined:
        case 'none':
            break;
        default:
            _class = ' spc' + cssKey;
            break;
    }
    
    return _class;
}
function Set_justifyContent(obj=null, parent=null){
    var _class = "";
    switch(obj['justifyContent']){
        case 'center':
            _class = ' itms-jfcC';
            break;
        case 'flex-start':
            _class = ' itms-jfcS';
            break;
        case 'flex-end':
            _class = ' itms-jfcE';
            break;
        case 'space-between':
            _class = ' itms-jfcSB';
            break;
        case 'space-around':
            _class = ' itms-jfcSA';
            break;
        case 'space-evenly':
            _class = ' itms-jfcSE';
            break;
    }
    
    return _class;
}
function Set_alignItems(obj=null, parent=null){
    var _class = "";
    switch(obj['alignItems']){
        case 'center':
            _class = ' itms-algC';
            break;
        case 'flex-start':
            _class = ' itms-algS';
            break;
        case 'flex-end':
            _class = ' itms-algE';
            break;
    }
    
    return _class;
}
function Set_TxtStyle(obj=null, parent=null){
    var _class = "";
    if(parent && parent['type']==='text' && parent['style'] && !obj['style']){ //span
        
    }else{
        switch(obj['style']){
            case 'normal':
                _class = ' ExFntStyNml';
                break;
            case 'italic':
                _class = ' ExFntStyIt';
                break;
            default:
                break;
        }
    }
    
    return _class;
}
//style
function Set_offset(obj=null, parent=null){
    var _Style = "";
    if(obj['offsetTop']){ _Style+=' top:'+obj['offsetTop']+';'; };
    if(obj['offsetBottom']){ _Style+=' bottom:'+obj['offsetBottom']+';'; };
    if(obj['offsetStart']){ _Style+=' left:'+obj['offsetStart']+';'; };
    if(obj['offsetEnd']){ _Style+=' right:'+obj['offsetEnd']+';'; };
    
    return _Style;
}
function Set_padding(obj=null, parent=null){
    var _Style = "";
    if(obj['paddingAll']){ _Style+=' padding:'+obj['paddingAll']+';'; };
    if(obj['paddingTop']){ _Style+=' padding-top:'+obj['paddingTop']+';'; };
    if(obj['paddingBottom']){ _Style+=' padding-bottom:'+obj['paddingBottom']+';'; };
    if(obj['paddingStart']){ _Style+=' padding-left:'+obj['paddingStart']+';'; };
    if(obj['paddingEnd']){ _Style+=' padding-right:'+obj['paddingEnd']+';'; };
    
    return _Style;
}
function Set_color(obj=null, parent=null, cssKey=null){
    var _Style = "";
    if(parent && parent['type']==='text' && parent['color'] && !obj['color']){ //span
        
    }else{
        switch(obj['type']){
            case 'text':
            case 'span':
                obj['color'] = (obj['color']) ? obj['color'] : '#444444';
                _Style = ' '+cssKey+':'+obj['color']+';';
                break;
        }
    }
    
    return _Style;
}
function Set_widthAndheight(obj=null, parent=null){
    var _Style = "";
    if(obj['width']){ _Style+=' width:'+obj['width']+';'; };
    if(obj['height']){ _Style+=' height:'+obj['height']+';'; };
    
    return _Style;
}
function Set_border(obj=null, parent=null){
    var _Style = "";
    if(obj['borderWidth']){ _Style+=' border-width:'+obj['borderWidth']+';'; };
    if(obj['borderColor']){ _Style+=' border-color:'+obj['borderColor']+';'; };
    if(obj['cornerRadius']){ _Style+=' border-radius:'+obj['cornerRadius']+';'; };
    
    return _Style;
}
function Set_backgroundColor(obj=null, parent=null){
    var _Style = "";
    if(obj['backgroundColor']){ _Style+=' background-color:'+obj['backgroundColor']+';'; };
    
    return _Style;
}
function Set_Background(obj=null, parent=null){
    var _Style = "";
    if(obj['background'] && obj['background']['type']){
        switch(obj['background']['type']){
            case 'linearGradient':
                 _Style += ' background:linear-gradient(';
                 _Style += obj['background']['angle'] + ', ';
                 _Style += obj['background']['startColor'] + ' 0%';
                 if(obj['background']['centerColor']){
                     _Style += ', ' + obj['background']['centerColor'] + ' ';
                     _Style += (obj['background']['centerPosition']) ? (obj['background']['centerPosition']) : '50%';
                 }
                 _Style += ', ' + obj['background']['endColor'] + ' 100%';
                 _Style += ');';
                break;
        }
    }
    
    return _Style;
}

function GetVideo(obj=null, parent=null){
    var GetAllclass='MdImg', StyleHeight, ImgSize, ImgStyle, aspectRatio=obj['aspectRatio'], Style='';
    if(!aspectRatio){
        obj['altContent']['aspectMode'] = 'fit';
    }
    GetAllclass += Set_flex(obj['altContent'], parent);
    GetAllclass += Set_position(obj['altContent'], parent);
    //margin
    GetAllclass += Set_alignV2(obj['altContent'], parent);
    GetAllclass += Set_gravity(obj['altContent'], parent);
    ImgSize = Set_size(obj['altContent'], parent, 'width');
    ImgStyle = (ImgSize.indexOf("width")!=-1) ? ImgSize : '';
    GetAllclass += (ImgSize.indexOf("width")!=-1) ? '' : ImgSize;
    if(aspectRatio){
        aspectRatio = aspectRatio.split(":");
        StyleHeight = aspectRatio[1]/aspectRatio[0] * 100;
    }else{
        StyleHeight = 100;
    }
    GetAllclass += Set_aspectMode(obj['altContent'], parent);
    //animated
    Style += Set_offset(obj['altContent'], parent);
    
    return  `<div class="${GetAllclass}" style="${Style}" id="${obj['id']}">
                <div  style="${ImgStyle}">
                    <a style="padding-bottom: ${StyleHeight}%;">
                        <span style="margin-top: 5%;margin-bottom: 5%;border-radius: 0;background-image:url('${obj['previewUrl']}');${Set_backgroundColor(obj['altContent'], parent)}"></span>
                        <video autoplay loop style="width: 100%;height: 100%;position: absolute;" onplay="this.parentNode.querySelector('.PlayIcon').style.display='none';"><source src="${obj['url']}"></video>
                        <span class="PlayIcon" style="background-color: #000000bf;">
                            <i class="fa fa-play" style="position: absolute;
                                                        font-size: 15px;
                                                        color: #fff;
                                                        top: 50%;
                                                        left: 50%;
                                                        transform: translate(-50%, -50%);
                                                        border: 2px solid #fff;
                                                        border-radius: 100%;
                                                        padding: 10px 9px 10px 11px;"></i>
                        </span>
                    </a>
                </div>
            </div>`;
}

function GetImage(obj=null, parent=null){
    var GetAllclass='MdImg', StyleHeight, ImgSize, ImgStyle, aspectRatio=obj['aspectRatio'], Style='';
    GetAllclass += Set_flex(obj, parent);
    GetAllclass += Set_position(obj, parent);
    //margin
    GetAllclass += Set_alignV2(obj, parent);
    GetAllclass += Set_gravity(obj, parent);
    ImgSize = Set_size(obj, parent, 'width');
    ImgStyle = (ImgSize.indexOf("width")!=-1) ? ImgSize : '';
    GetAllclass += (ImgSize.indexOf("width")!=-1) ? '' : ImgSize;
    if(aspectRatio){
        aspectRatio = aspectRatio.split(":");
        StyleHeight = aspectRatio[1]/aspectRatio[0] * 100;
    }else{
        StyleHeight = 100;
    }
    GetAllclass += Set_aspectMode(obj, parent);
    //animated
    Style += Set_offset(obj, parent);
    
    return  '<div class="'+ GetAllclass +'" style="'+Style+'" id="'+ obj['id'] +'">'+
                '<div  style="'+ ImgStyle +'">'+
                    '<a style="padding-bottom:'+ StyleHeight +'%;">'+
                        '<span style="'+ Set_backgroundColor(obj, parent) +'background-image:url('+"'"+ obj['url'] +"'"+');"></span>'+
                    '</a>'+
                '</div>'+
            '</div>';
}

function GetIcon(obj=null, parent=null){
    var GetAllclass='MdIco', StyleWidth, marginType, ImgMargin, ImgSize, aspectRatio=obj['aspectRatio'], Style='';
    GetAllclass += Set_flex(obj, parent);
    GetAllclass += Set_position(obj, parent);
    marginType = (parent['layout']==='vertical') ? 'margin-right' : 'margin-left';
    ImgMargin = Set_margin(obj, parent, marginType);
    Style += (ImgMargin.indexOf(marginType)!=-1) ? ImgMargin : '';
    GetAllclass += (ImgMargin.indexOf(marginType)!=-1) ? '' : ImgMargin;
    ImgSize = Set_size(obj, parent, 'font-size');
    Style += (ImgSize.indexOf("font-size")!=-1) ? ImgSize : '';
    GetAllclass += (ImgSize.indexOf("font-size")!=-1) ? '' : ImgSize;
    GetAllclass += Set_aspectMode(obj, parent);
    if(aspectRatio){
        aspectRatio = aspectRatio.split(":");
        StyleWidth = aspectRatio[0]/aspectRatio[1];
    }else{
        StyleWidth = 1;
    }
    Style += Set_offset(obj, parent);
    
    return  '<div class="'+GetAllclass+'" style="'+Style+'" id="'+ obj['id'] +'" id="'+ obj['id'] +'">'+
                '<div>'+
                    '<span style="background-image:url('+"'"+obj['url']+"'"+'); width:'+StyleWidth+'em;"></span>'+
                '</div>'+
            '</div>';
}

function GetText(obj=null, parent=null, type=null){
    var GetAllclass='MdTxt', marginType, TxtMargin, TxtSize, Style='', StyleWrap='', TextVal='';
    if(type === 'span'){
        GetAllclass = 'MdSpn';
    }
    GetAllclass += Set_flex(obj, parent);
    if(obj['flex']){
        Style += '-webkit-box-flex:'+obj['flex']+';flex-grow:'+obj['flex']+';';
    }
    marginType = (parent['layout']==='vertical') ? 'margin-right' : 'margin-left';
    TxtMargin = Set_margin(obj, parent, marginType);
    Style += (TxtMargin.indexOf(marginType)!=-1) ? TxtMargin : '';
    GetAllclass += (TxtMargin.indexOf(marginType)!=-1) ? '' : TxtMargin;
    TxtSize = Set_size(obj, parent, 'font-size');
    Style += (TxtSize.indexOf("font-size")!=-1) ? TxtSize : '';
    GetAllclass += (TxtSize.indexOf("font-size")!=-1) ? '' : TxtSize;
    Style += Set_color(obj, parent, 'color');
    GetAllclass += Set_weight(obj, parent);
    GetAllclass += Set_TxtStyle(obj, parent);
    GetAllclass += Set_decoration(obj, parent);
    GetAllclass += Set_position(obj, parent);
    GetAllclass += Set_align(obj, parent);
    GetAllclass += Set_gravity(obj, parent);
    GetAllclass += Set_wrap(obj, parent);
    if(obj['contents'] && obj['contents'].length>0){
        for (const [key, span] of Object.entries(obj['contents'])) {
            TextVal += GetText(span, obj, 'span');
        }
    }else{ //text
        if(obj['maxLines']){
            StyleWrap = '-webkit-line-clamp: ' + obj['maxLines'] + ';';
        }
        TextVal = obj['text'].replace(/\r\n|\n/g,"</br>");
    }
    //adjustMode
    Style += Set_offset(obj, parent);
    
    if(type === 'span'){
        return  '<span id="'+ obj['id'] +'" class="'+GetAllclass+'" style="'+Style+'font-family: -apple-system,'+"'"+'BlinkMacSystemFont'+"'"+',Helvetica,Roboto,sans-serif;">'+
                    TextVal+
                '</span>';
    }else{
        return  '<div class="'+GetAllclass+'" style="'+Style+'" id="'+ obj['id'] +'">'+
                    '<p style="'+StyleWrap+'font-family: -apple-system,'+"'"+'BlinkMacSystemFont'+"'"+',Helvetica,Roboto,sans-serif;margin: 0px;">'+
                        TextVal+
                    '</p>'+
                '</div>';
    }
}

function GetButton(obj=null, parent=null){
    var GetAllclass='MdBtn', marginType, BtnMargin, PrimaryStyle='', LinkStyle='', Style='';
    GetAllclass += Set_flex(obj, parent);
    GetAllclass += Set_position(obj, parent);
    marginType = (parent['layout']==='vertical') ? 'margin-right' : 'margin-left';
    BtnMargin = Set_margin(obj, parent, marginType);
    Style += (BtnMargin.indexOf(marginType)!=-1) ? BtnMargin : '';
    GetAllclass += (BtnMargin.indexOf(marginType)!=-1) ? '' : BtnMargin;
    if(obj['height'] === 'sm'){
        GetAllclass += ' ExSm';
    }
    switch(obj['style']){
        case 'primary':
            GetAllclass += ' ExBtn1';
            break;
        case 'secondary':
            GetAllclass += ' ExBtn2';
            break;
        default:
        case 'link':
            GetAllclass += ' ExBtnL';
            break;
    }
    if(obj['color']){
        if(obj['style']=='primary' || obj['style']=='secondary'){
            PrimaryStyle+=' background-color:'+obj['color']+';';
        }else{
            LinkStyle+=' color:'+obj['color']+';';
        }
    };
    GetAllclass += Set_gravity(obj, parent);
    //adjustMode
    
    return  '<div class="'+GetAllclass+'" style="'+Style+'" id="'+ obj['id'] +'">'+
                '<a style="'+PrimaryStyle+'">'+
                    '<div style="'+LinkStyle+'">'+
                        obj['action']['label']+
                    '</div>'+
                '</a>'+
            '</div>';
}

function GetFiller(obj=null, parent=null){
    return '<div class="mdBxFiller'+ Set_flex(obj, parent) +'" id="'+ obj['id'] +'"></div>';
}

function GetSeparator(obj=null, parent=null){
    var GetAllclass='MdSep', marginType, SepMargin, Style='';
    GetAllclass += Set_flex(obj, parent);
    marginType = (parent['layout']==='vertical') ? 'margin-right' : 'margin-left';
    SepMargin = Set_margin(obj, parent, marginType);
    Style += (SepMargin.indexOf(marginType)!=-1) ? SepMargin : '';
    GetAllclass += (SepMargin.indexOf(marginType)!=-1) ? '' : SepMargin;
    Style += Set_color(obj, parent, 'border-color');
    
    return '<div class="'+GetAllclass+'" style="'+Style+'" id="'+ obj['id'] +'"></div>';
}

function GetSpacer(obj=null, parent=null){
    var GetAllclass='mdBxSpacer';
    GetAllclass += Set_flex(obj, parent);
    GetAllclass += Set_size(obj, parent, null, 'spc');
    
    return '<div class="'+GetAllclass+'" id="'+ obj['id'] +'"></div>';
}

function GetBox(obj=null, parent=null){
    var GetAllclass='MdBx', marginType, BoxMargin, spacingType='', Style='';
    if(parent['type']==='box'){
        GetAllclass += ' MdBox';
    }
    GetAllclass += Set_position(obj, parent);
    GetAllclass += Set_flex(obj, parent);
    switch(obj['layout']){
        case 'baseline':
            GetAllclass += ' hr bl';
            break;
        case 'horizontal':
            GetAllclass += ' hr';
            break;
        default:
        case 'vertical':
            GetAllclass += ' vr';
            break;
    }
    spacingType = (parent['layout']==='vertical') ? 'alg' : 'grv';
    GetAllclass += Set_spacing(obj, parent, spacingType);
    Style += (obj['spacing']) ? '--spcCtn:'+obj['spacing']+';' : '';
    marginType = (parent['layout']==='vertical') ? 'margin-right' : 'margin-left';
    BoxMargin = Set_margin(obj, parent, marginType);
    Style += (BoxMargin.indexOf(marginType)!=-1) ? BoxMargin : '';
    GetAllclass += (BoxMargin.indexOf(marginType)!=-1) ? '' : BoxMargin;
    Style += Set_widthAndheight(obj, parent);
    Style += Set_backgroundColor(obj, parent);
    Style += Set_border(obj, parent);
    GetAllclass += Set_justifyContent(obj, parent);
    GetAllclass += Set_alignItems(obj, parent);
    Style += Set_offset(obj, parent);
    Style += Set_padding(obj, parent);
    Style += Set_Background(obj, parent);
    
    var box = '<div class="'+ GetAllclass +'" style="'+ Style +'" id="'+ obj['id'] +'">';
        for (const [key, box_] of Object.entries(obj['contents'])) {
            box += ItemProcess(box_, obj);
        }
    box += '</div>';
    return box;
}

function ItemProcess(item=null, parent=null){
    var Item=null;
    switch(item['type']){
        case 'image':
            Item = GetImage(item, parent);
            break;
        case 'video':
            Item = GetVideo(item, parent);
            break;
        case 'icon':
            Item = GetIcon(item, parent);
            break;
        case 'text':
            Item = GetText(item, parent);
            break;
        case 'span':
            Item = GetText(item, parent, 'span');
            break;
        case 'button':
            Item = GetButton(item, parent);
            break;
        case 'box':
            Item = GetBox(item, parent);
            break;
        case 'filler':
            Item = GetFiller(item, parent);
            break;
        case 'separator':
            Item = GetSeparator(item, parent);
            break;
        case 'spacer':
            Item = GetSpacer(item, parent);
            break;
    }
    
    return Item;
}

function GetBubble(Data=null, View=null, Type=null){
    if(Data){
        var BubbleSize = '';
        switch(Data['size']){
            case 'nano':
                BubbleSize = 'LyNa';
                break;
            case 'micro':
                BubbleSize = 'LyMi';
                break;
            case 'kilo':
                BubbleSize = 'LyKi';
                break;
            case 'giga':
                BubbleSize = 'LyGi';
                break;
            default:
            case 'mega':
                BubbleSize = 'LyMe';
                break;
        }
        if(Type==='carousel'){
            BubbleSize += ' lyItem';
        }
        var T1_Class = 'T1 ';
        T1_Class += (Data['direction']==='rtl') ? 'fxRTL': 'fxLTR';
        var Dir = (Data['direction']==='rtl') ? 'rtl' : 'ltr';
        View += '<div class="'+ BubbleSize +'"><div class="'+ T1_Class +'" dir="'+ Dir +'">';
        for (const [key, item] of Object.entries(Data)) {
            switch(key){
                case 'header':
                case 'hero':
                case 'body':
                case 'footer':
                    var BubbleClass = '';
                    var BubbleStyle = (Data['styles']&&Data['styles'][key]&&Data['styles'][key]['backgroundColor']) ? 'background-color: '+ Data['styles'][key]['backgroundColor'] +';' : '';
                    var separatorStyle = (Data['styles']&&Data['styles'][key]&&Data['styles'][key]['separatorColor']) ? 'border-color: '+ Data['styles'][key]['separatorColor'] +';' : '';
                    switch(key){
                        case 'header':
                            BubbleClass = 't1Header';
                            break;
                        case 'hero':
                            BubbleClass = 't1Hero';
                            break;
                        case 'body':
                            BubbleClass = (Data['footer']) ? 'ExHasFooter t1Body' : 't1Body';
                            break;
                        case 'footer':
                            BubbleClass = 't1Footer';
                            break;
                    }
                    View += '<div class="'+ BubbleClass +'" style="'+ BubbleStyle +'">';
                        if(Data['styles']&&Data['styles'][key]&&Data['styles'][key]['separator']){
                            View += '<div class="MdSep" style="'+ separatorStyle +'"></div>';
                        }
                        View += ItemProcess(item, Data);
                    View += '</div>';
                    break;
            }
        }
        View += '</div></div>';
    }
    
    return View;
}

function GetCotainer(Data = null){
    var View = '';
    if(Data){
        if(Data['type']==='carousel'){
            for (const [key, bubble] of Object.entries(Data['contents'])) {
                View = GetBubble(bubble, View, Data['type']);
            }
        }else if(Data['type']==='bubble'){
            View = GetBubble(Data, View, Data['type']);
        }
        
        if(Data['type']==='carousel'){
            View = '<div class="LySlider"><div class="lyInner">'+ View +'</div></div>';
        }
    }
    
    return View;
}

function GetPreview(Json=null, FlexJson=null){
    if(Json && Json.config.data){
        var Data = JSON.parse(Json.config.data);
    }
    //Preview
    if(Data){
        var Preview = GetCotainer(Data);
        if($('#CustomerMsg', window.parent.document)[0]){
            var altText = $('#subject', window.parent.document).val() ? $('#subject', window.parent.document).val() : '請輸入標題';
            var SaveJson = {
                "type": "flex",
                "altText": altText,
                "contents": FlexJson
            };
            parent.SetVal(JSON.stringify(SaveJson));
        }
    }
    var HTML =  '<!doctype html>'+
                '<html>'+
                    '<head>'+
                        '<meta charset="UTF-8">'+
                        '<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">'+
                        '<meta name="format-detection" content="telephone=no">'+
                        '<link href="/library/plugin/bootstrap/font-awesome.min.css" rel="stylesheet">'+
                        '<link rel="stylesheet" type="text/css" href="/library/plugin/flex/preview.css?v='+ new Date().getTime() +'">'+
                    '</head>'+
                    '<body style="margin: 0;">'+
                        Preview+
                    '</body>'+
                '</html>';
    var CheckFrameLoadedFInterval = window.setInterval(function() {
        if(FrameLoadedFlag){
            window.clearInterval(CheckFrameLoadedFInterval);

            document.querySelector('#viewer-frame').contentWindow.document.querySelector('body>div').removeAttribute('FrameUpdateFlag');
            var StartTime = new Date().getTime();
            var FrameUpdateInterval = window.setInterval(function() {
                var FrameUpdateFlag = document.querySelector('#viewer-frame').contentWindow.document.querySelector('body>div').getAttribute('FrameUpdateFlag');
                if(!FrameUpdateFlag){
                    var ResetFlag = false;
                    if(document.querySelector('#viewer-frame').contentWindow.document.querySelector('body>div').classList.contains('LySlider')){
                        if((new Date().getTime()-StartTime) > 1000){ //幾毫秒
                            ResetFlag = true;
                            document.querySelector('#viewer-frame').contentWindow.document.querySelector("body>.LySlider").style.height = (document.querySelector('#viewer-frame').contentWindow.document.querySelector("body>.LySlider>div").offsetHeight+10) + 'px';
                        }
                    }else{
                        ResetFlag = true;
                    }
                    if(ResetFlag){
                        document.querySelector('#viewer-frame').contentWindow.document.querySelector('body>div').setAttribute('FrameUpdateFlag', true);
                        window.clearInterval(FrameUpdateInterval);
                    }
                }
            }, 100);
        }
    }, 100);
    return HTML;//Json.data
}

function is_json(str) {
    try {
        return JSON.parse(str);
    } catch (e) {
        return false;
    }
}
var FrameLoadedFlag = false;
function FrameLoaded(){
    if(!FrameLoadedFlag){
        var FrameLoadedInterval = window.setInterval(function() {
            if(document.querySelector('#viewer-frame').contentWindow.document.querySelector('body>div')){
                FrameLoadedFlag = true;
                window.clearInterval(FrameLoadedInterval);
                navigator.clipboard.readText().then(text => {
                    if(text){
                        var ClipboardObj = is_json(text);
                        if(ClipboardObj && ClipboardObj['type'] && (ClipboardObj['type']==='carousel'||ClipboardObj['type']==='bubble')){
                            document.querySelector("#editor").value = text;
                            document.querySelector("#editor").click();
                            document.querySelector("#ApplyFlex").click();
                        }
                    }
                });
            }
        }, 100);
    }
}
function FlexLoaded(obj, Action='', Data=''){
    if(obj.contents().find("html>body>div").hasClass('LySlider')){
        obj.contents().find("html>body>.LySlider").css('height', obj.contents().find("html>body>.LySlider>div").css('height').slice(0,-2)*1+10+'px');
    }else{
        obj.contents().find("html>body>div").css('height', obj.contents().find("html>body>div>div").css('height'));
    }
    obj.css('height', obj.contents().find("html>body>div").css('height'))
        .css('width', obj.contents().find("html>body>div").css('width'));
    switch(Action){
        case 'CopyMessage':
            obj.contents().find("html>body").append('<input type="hidden" id="Copy'+Data+'" value='+"'"+ obj.attr('data-json') +"'"+'>');
            obj.contents().find("html>body").attr('onclick',    'if(confirm("是否前往[FLEX訊息模擬器]查看訊息?")){' + 
                                                                    'document.querySelector("#Copy'+Data+'").setAttribute("type", "text");' + 
                                                                    'document.querySelector("#Copy'+Data+'").select();' + 
                                                                    'document.execCommand("Copy");' + 
                                                                    'document.querySelector("#Copy'+Data+'").setAttribute("type", "hidden");' + 
                                                                    'window.open("'+ window.location.origin +'/ft/flex-simulator");' + 
                                                                '}'
                                                );
            break;
        case 'ParentObjClick':
            obj.contents().find("html>body").attr('onclick', "window.parent.document.querySelector('"+Data+"').click();");
            break;
            
    }
}
function GetFlexView(obj, FlexJson='{}', Attr={}, IFrameAttr={}){
    if(FlexJson){
        if(obj.attr('onclick') === 'GetFlexView($(this), $(this).attr("data-json"));'){
            obj.removeAttr('onclick');
        }
        var Action="",Data="";
        if(Attr['CopyMessageId']){
            Action = 'CopyMessage';
            Data = Attr['CopyMessageId'];
        }else if(IFrameAttr['ParentObjClickAttr']){
            Action = 'ParentObjClick';
            Data = IFrameAttr['ParentObjClickAttr'];
        }
        obj.html("<iframe style='border: none;' onload='FlexLoaded($(this), \""+Action+"\", \""+Data+"\");'></iframe>");
        obj.find('iframe').attr('srcdoc', GetPreview({config: {data: FlexJson}}, JSON.parse(FlexJson)));
        obj.find('iframe').attr('data-json', FlexJson);
        
        for (const [key, value] of Object.entries(Attr)) {
            if(key !== 'CopyMessageId'){
                obj.attr(key, value);
            }
        }
        for (const [key, value] of Object.entries(IFrameAttr)) {
            if(key !== 'ParentObjClickAttr'){
                obj.find('iframe').attr(key, value);
            }
        }
    }
}
function CheckFlexIFrame(id){
    if(id){
        this['CheckFlexIFrameInterval'+id] = window.setInterval(function() {
            if(!$('#'+id).find('iframe')[0]){
                window.clearInterval(this['CheckFlexIFrameInterval'+id]);
                $('#'+id).click();
            }
        }, 100);
    }
}