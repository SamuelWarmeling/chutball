<html lang="zh-CN"
      style="--status-bar-height: 0px; --top-window-height: 0px; --window-left: 0px; --window-right: 0px; --window-margin: 0px; --window-top: calc(var(--top-window-height) + 0px); --window-bottom: 0px;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, viewport-fit=cover">
    <link rel="stylesheet" href="{{asset('public')}}/static//index.2da1efab.css">
    <style type="text/css">
        body {
            background-color: #f1f1f1;
            font-size: 12px;
            color: #333;
            font-family: Helvetica Neue, Helvetica, sans-serif
        }

        uni-view,
        uni-scroll-view,
        uni-swiper,
        uni-button,
        uni-input,
        uni-textarea,
        uni-label,
        uni-navigator,
        uni-image {
            box-sizing: border-box
        }

        .round {
            border-radius: 2173px
        }

        .radius {
            border-radius: 2px
        }

        /* ==================
          图片
 ==================== */
        uni-image {
            max-width: 100%;
            display: inline-block;
            position: relative;
            z-index: 0
        }

        uni-image.loading::before {
            content: "";
            background-color: #f5f5f5;
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -2
        }

        uni-image.loading::after {
            content: "\e7f1";
            font-family: cuIcon;
            position: absolute;
            top: 0;
            left: 0;
            width: 13px;
            height: 13px;
            line-height: 13px;
            right: 0;
            bottom: 0;
            z-index: -1;
            font-size: 13px;
            margin: auto;
            color: #ccc;
            -webkit-animation: cuIcon-spin 2s infinite linear;
            animation: cuIcon-spin 2s infinite linear;
            display: block
        }

        .response {
            width: 100%
        }

        /* ==================
         开关
 ==================== */
        uni-switch,
        uni-checkbox,
        uni-radio {
            position: relative
        }

        uni-switch::after,
        uni-switch::before {
            font-family: cuIcon;
            content: "\e645";
            position: absolute;
            color: #fff !important;
            top: 0;
            left: 0px;
            font-size: 11px;
            line-height: 26px;
            width: 50%;
            text-align: center;
            pointer-events: none;
            -webkit-transform: scale(0);
            transform: scale(0);
            transition: all .3s ease-in-out 0s;
            z-index: 9;
            bottom: 0;
            height: 26px;
            margin: auto
        }

        uni-switch::before {
            content: "\e646";
            right: 0;
            -webkit-transform: scale(1);
            transform: scale(1);
            left: auto
        }

        uni-switch[checked]::after,
        uni-switch.checked::after {
            -webkit-transform: scale(1);
            transform: scale(1)
        }

        uni-switch[checked]::before,
        uni-switch.checked::before {
            -webkit-transform: scale(0);
            transform: scale(0)
        }

        uni-radio::before,
        uni-checkbox::before {
            font-family: cuIcon;
            content: "\e645";
            position: absolute;
            color: #fff !important;
            top: 50%;
            margin-top: -8px;
            right: 5px;
            font-size: 13px;
            line-height: 16px;
            pointer-events: none;
            -webkit-transform: scale(1);
            transform: scale(1);
            transition: all .3s ease-in-out 0s;
            z-index: 9
        }

        uni-radio .wx-radio-input,
        uni-checkbox .wx-checkbox-input,
        uni-radio .uni-radio-input,
        uni-checkbox .uni-checkbox-input {
            margin: 0;
            width: 24px;
            height: 24px
        }

        uni-checkbox.round .wx-checkbox-input,
        uni-checkbox.round .uni-checkbox-input {
            border-radius: 43px
        }

        uni-switch[checked]::before {
            -webkit-transform: scale(0);
            transform: scale(0)
        }

        uni-switch .wx-switch-input,
        uni-switch .uni-switch-input {
            border: none;
            padding: 0 24px;
            width: 48px;
            height: 26px;
            margin: 0;
            border-radius: 43px
        }

        uni-switch .wx-switch-input:not([class*="bg-"]),
        uni-switch .uni-switch-input:not([class*="bg-"]) {
            background: #8799a3 !important
        }

        uni-switch .wx-switch-input::after,
        uni-switch .uni-switch-input::after {
            margin: auto;
            width: 26px;
            height: 26px;
            border-radius: 43px;
            left: 0px;
            top: 0px;
            bottom: 0px;
            position: absolute;
            -webkit-transform: scale(.9);
            transform: scale(.9);
            transition: all .1s ease-in-out 0s
        }

        uni-switch .wx-switch-input.wx-switch-input-checked::after,
        uni-switch .uni-switch-input.uni-switch-input-checked::after {
            margin: auto;
            left: 22px;
            box-shadow: none;
            -webkit-transform: scale(.9);
            transform: scale(.9)
        }

        uni-radio-group {
            display: inline-block
        }

        uni-switch.radius .wx-switch-input::after,
        uni-switch.radius .wx-switch-input,
        uni-switch.radius .wx-switch-input::before,
        uni-switch.radius .uni-switch-input::after,
        uni-switch.radius .uni-switch-input,
        uni-switch.radius .uni-switch-input::before {
            border-radius: 4px
        }

        uni-switch .wx-switch-input::before,
        uni-radio.radio::before,
        uni-checkbox .wx-checkbox-input::before,
        uni-radio .wx-radio-input::before,
        uni-switch .uni-switch-input::before,
        uni-radio.radio::before,
        uni-checkbox .uni-checkbox-input::before,
        uni-radio .uni-radio-input::before {
            display: none
        }

        uni-radio.radio[checked]::after,
        uni-radio.radio .uni-radio-input-checked::after {
            content: "";
            background-color: initial;
            display: block;
            position: absolute;
            width: 8px;
            height: 8px;
            z-index: 999;
            top: 0px;
            left: 0px;
            right: 0;
            bottom: 0;
            margin: auto;
            border-radius: 86px;
            border: 7px solid #fff !important;
        }

        .switch-sex::after {
            content: "\e71c"
        }

        .switch-sex::before {
            content: "\e71a"
        }

        .switch-sex .wx-switch-input,
        .switch-sex .uni-switch-input {
            background: #e54d42 !important;
            border-color: #e54d42 !important
        }

        .switch-sex[checked] .wx-switch-input,
        .switch-sex.checked .uni-switch-input {
            background: #0081ff !important;
            border-color: #0081ff !important
        }

        uni-switch.red[checked] .wx-switch-input.wx-switch-input-checked,
        uni-checkbox.red[checked] .wx-checkbox-input,
        uni-radio.red[checked] .wx-radio-input,
        uni-switch.red.checked .uni-switch-input.uni-switch-input-checked,
        uni-checkbox.red.checked .uni-checkbox-input,
        uni-radio.red.checked .uni-radio-input {
            background-color: #e54d42 !important;
            border-color: #e54d42 !important;
            color: #fff !important
        }

        uni-switch.orange[checked] .wx-switch-input,
        uni-checkbox.orange[checked] .wx-checkbox-input,
        uni-radio.orange[checked] .wx-radio-input,
        uni-switch.orange.checked .uni-switch-input,
        uni-checkbox.orange.checked .uni-checkbox-input,
        uni-radio.orange.checked .uni-radio-input {
            background-color: #f37b1d !important;
            border-color: #f37b1d !important;
            color: #fff !important
        }

        uni-switch.yellow[checked] .wx-switch-input,
        uni-checkbox.yellow[checked] .wx-checkbox-input,
        uni-radio.yellow[checked] .wx-radio-input,
        uni-switch.yellow.checked .uni-switch-input,
        uni-checkbox.yellow.checked .uni-checkbox-input,
        uni-radio.yellow.checked .uni-radio-input {
            background-color: #fbbd08 !important;
            border-color: #fbbd08 !important;
            color: #333 !important
        }

        uni-switch.olive[checked] .wx-switch-input,
        uni-checkbox.olive[checked] .wx-checkbox-input,
        uni-radio.olive[checked] .wx-radio-input,
        uni-switch.olive.checked .uni-switch-input,
        uni-checkbox.olive.checked .uni-checkbox-input,
        uni-radio.olive.checked .uni-radio-input {
            background-color: #0081ff !important;
            border-color: #0081ff !important;
            color: #fff !important
        }

        uni-switch.green[checked] .wx-switch-input,
        uni-switch[checked] .wx-switch-input,
        uni-checkbox.green[checked] .wx-checkbox-input,
        uni-checkbox[checked] .wx-checkbox-input,
        uni-radio.green[checked] .wx-radio-input,
        uni-radio[checked] .wx-radio-input,
        uni-switch.green.checked .uni-switch-input,
        uni-switch.checked .uni-switch-input,
        uni-checkbox.green.checked .uni-checkbox-input,
        uni-checkbox.checked .uni-checkbox-input,
        uni-radio.green.checked .uni-radio-input,
        uni-radio.checked .uni-radio-input {
            /* background: rgb(231, 183, 36) !important;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           border-color: rgb(231, 183, 36) !important; */
            /* background:  #b83b20 !important;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           border-color:  #b83b20 !important; */
            background: #a9abfc !important;
            border-color: #a9abfc !important;
            color: #fff
        }

        uni-switch.cyan[checked] .wx-switch-input,
        uni-checkbox.cyan[checked] .wx-checkbox-input,
        uni-radio.cyan[checked] .wx-radio-input,
        uni-switch.cyan.checked .uni-switch-input,
        uni-checkbox.cyan.checked .uni-checkbox-input,
        uni-radio.cyan.checked .uni-radio-input {
            background-color: #1cbbb4 !important;
            border-color: #1cbbb4 !important;
            color: #fff !important
        }

        uni-switch.blue[checked] .wx-switch-input,
        uni-checkbox.blue[checked] .wx-checkbox-input,
        uni-radio.blue[checked] .wx-radio-input,
        uni-switch.blue.checked .uni-switch-input,
        uni-checkbox.blue.checked .uni-checkbox-input,
        uni-radio.blue.checked .uni-radio-input {
            background-color: #0081ff !important;
            border-color: #0081ff !important;
            color: #fff !important
        }

        uni-switch.purple[checked] .wx-switch-input,
        uni-checkbox.purple[checked] .wx-checkbox-input,
        uni-radio.purple[checked] .wx-radio-input,
        uni-switch.purple.checked .uni-switch-input,
        uni-checkbox.purple.checked .uni-checkbox-input,
        uni-radio.purple.checked .uni-radio-input {
            background-color: #6739b6 !important;
            border-color: #6739b6 !important;
            color: #fff !important
        }

        uni-switch.mauve[checked] .wx-switch-input,
        uni-checkbox.mauve[checked] .wx-checkbox-input,
        uni-radio.mauve[checked] .wx-radio-input,
        uni-switch.mauve.checked .uni-switch-input,
        uni-checkbox.mauve.checked .uni-checkbox-input,
        uni-radio.mauve.checked .uni-radio-input {
            background-color: #9c26b0 !important;
            border-color: #9c26b0 !important;
            color: #fff !important
        }

        uni-switch.pink[checked] .wx-switch-input,
        uni-checkbox.pink[checked] .wx-checkbox-input,
        uni-radio.pink[checked] .wx-radio-input,
        uni-switch.pink.checked .uni-switch-input,
        uni-checkbox.pink.checked .uni-checkbox-input,
        uni-radio.pink.checked .uni-radio-input {
            background-color: #e03997 !important;
            border-color: #e03997 !important;
            color: #fff !important
        }

        uni-switch.brown[checked] .wx-switch-input,
        uni-checkbox.brown[checked] .wx-checkbox-input,
        uni-radio.brown[checked] .wx-radio-input,
        uni-switch.brown.checked .uni-switch-input,
        uni-checkbox.brown.checked .uni-checkbox-input,
        uni-radio.brown.checked .uni-radio-input {
            background-color: #a5673f !important;
            border-color: #a5673f !important;
            color: #fff !important
        }

        uni-switch.grey[checked] .wx-switch-input,
        uni-checkbox.grey[checked] .wx-checkbox-input,
        uni-radio.grey[checked] .wx-radio-input,
        uni-switch.grey.checked .uni-switch-input,
        uni-checkbox.grey.checked .uni-checkbox-input,
        uni-radio.grey.checked .uni-radio-input {
            background-color: #8799a3 !important;
            border-color: #8799a3 !important;
            color: #fff !important
        }

        uni-switch.gray[checked] .wx-switch-input,
        uni-checkbox.gray[checked] .wx-checkbox-input,
        uni-radio.gray[checked] .wx-radio-input,
        uni-switch.gray.checked .uni-switch-input,
        uni-checkbox.gray.checked .uni-checkbox-input,
        uni-radio.gray.checked .uni-radio-input {
            background-color: #f0f0f0 !important;
            border-color: #f0f0f0 !important;
            color: #333 !important
        }

        uni-switch.black[checked] .wx-switch-input,
        uni-checkbox.black[checked] .wx-checkbox-input,
        uni-radio.black[checked] .wx-radio-input,
        uni-switch.black.checked .uni-switch-input,
        uni-checkbox.black.checked .uni-checkbox-input,
        uni-radio.black.checked .uni-radio-input {
            background-color: #333 !important;
            border-color: #333 !important;
            color: #fff !important
        }

        uni-switch.white[checked] .wx-switch-input,
        uni-checkbox.white[checked] .wx-checkbox-input,
        uni-radio.white[checked] .wx-radio-input,
        uni-switch.white.checked .uni-switch-input,
        uni-checkbox.white.checked .uni-checkbox-input,
        uni-radio.white.checked .uni-radio-input {
            background-color: #fff !important;
            border-color: #fff !important;
            color: #333 !important
        }

        /* ==================
          边框
 ==================== */
        /* -- 实线 -- */
        .solid,
        .solid-top,
        .solid-right,
        .solid-bottom,
        .solid-left,
        .solids,
        .solids-top,
        .solids-right,
        .solids-bottom,
        .solids-left,
        .dashed,
        .dashed-top,
        .dashed-right,
        .dashed-bottom,
        .dashed-left {
            position: relative
        }

        .solid::after,
        .solid-top::after,
        .solid-right::after,
        .solid-bottom::after,
        .solid-left::after,
        .solids::after,
        .solids-top::after,
        .solids-right::after,
        .solids-bottom::after,
        .solids-left::after,
        .dashed::after,
        .dashed-top::after,
        .dashed-right::after,
        .dashed-bottom::after,
        .dashed-left::after {
            content: " ";
            width: 200%;
            height: 200%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: inherit;
            -webkit-transform: scale(.5);
            transform: scale(.5);
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            pointer-events: none;
            box-sizing: border-box
        }

        .solid::after {
            border: 1px solid rgba(0, 0, 0, .1)
        }

        .solid-top::after {
            border-top: 1px solid rgba(0, 0, 0, .1)
        }

        .solid-right::after {
            border-right: 1px solid rgba(0, 0, 0, .1)
        }

        .solid-bottom::after {
            border-bottom: 1px solid rgba(0, 0, 0, .1)
        }

        .solid-left::after {
            border-left: 1px solid rgba(0, 0, 0, .1)
        }

        .solids::after {
            border: 3px solid #eee
        }

        .solids-top::after {
            border-top: 3px solid #eee
        }

        .solids-right::after {
            border-right: 3px solid #eee
        }

        .solids-bottom::after {
            border-bottom: 3px solid #eee
        }

        .solids-left::after {
            border-left: 3px solid #eee
        }

        /* -- 虚线 -- */
        .dashed::after {
            border: 1px dashed #ddd
        }

        .dashed-top::after {
            border-top: 1px dashed #ddd
        }

        .dashed-right::after {
            border-right: 1px dashed #ddd
        }

        .dashed-bottom::after {
            border-bottom: 1px dashed #ddd
        }

        .dashed-left::after {
            border-left: 1px dashed #ddd
        }

        /* -- 阴影 -- */
        .shadow[class*="white"] {
            --ShadowSize: 0 1px 2px
        }

        .shadow-lg {
            --ShadowSize: 0px 17px 43px 0px
        }

        .shadow-warp {
            position: relative;
            box-shadow: 0 0 4px rgba(0, 0, 0, .1)
        }

        .shadow-warp:before,
        .shadow-warp:after {
            position: absolute;
            content: "";
            top: 8px;
            bottom: 13px;
            left: 8px;
            width: 50%;
            box-shadow: 0 13px 8px rgba(0, 0, 0, .2);
            -webkit-transform: rotate(-3deg);
            transform: rotate(-3deg);
            z-index: -1
        }

        .shadow-warp:after {
            right: 8px;
            left: auto;
            -webkit-transform: rotate(3deg);
            transform: rotate(3deg)
        }

        .shadow-blur {
            position: relative
        }

        .shadow-blur::before {
            content: "";
            display: block;
            background: inherit;
            -webkit-filter: blur(4px);
            filter: blur(4px);
            position: absolute;
            width: 100%;
            height: 100%;
            top: 4px;
            left: 4px;
            z-index: -1;
            opacity: .4;
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            border-radius: inherit;
            -webkit-transform: scale(1);
            transform: scale(1)
        }

        /* ==================
          按钮
 ==================== */
        .cu-btn {
            position: relative;
            border: 0px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            padding: 0 13px;
            font-size: 12px;
            height: 27px;
            line-height: 1;
            text-align: center;
            text-decoration: none;
            overflow: visible;
            margin-left: 0;
            -webkit-transform: translate(0px, 0px);
            transform: translate(0px, 0px);
            margin-right: 0
        }

        .cu-btn::after {
            display: none
        }

        .cu-btn:not([class*="bg-"]) {
            background-color: #f0f0f0
        }

        .cu-btn[class*="line"] {
            background-color: initial
        }

        .cu-btn[class*="line"]::after {
            content: " ";
            display: block;
            width: 200%;
            height: 200%;
            position: absolute;
            top: 0;
            left: 0;
            border: 1px solid currentColor;
            -webkit-transform: scale(.5);
            transform: scale(.5);
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            box-sizing: border-box;
            border-radius: 5px;
            z-index: 1;
            pointer-events: none
        }

        .cu-btn.round[class*="line"]::after {
            border-radius: 434px
        }

        .cu-btn[class*="lines"]::after {
            border: 2px solid currentColor
        }

        .cu-btn[class*="bg-"]::after {
            display: none
        }

        .cu-btn.sm {
            padding: 0 8px;
            font-size: 8px;
            height: 20px
        }

        .cu-btn.lg {
            padding: 0 17px;
            font-size: 13px;
            height: 34px
        }

        .cu-btn.cuIcon.sm {
            width: 20px;
            height: 20px
        }

        .cu-btn.cuIcon {
            width: 27px;
            height: 27px;
            border-radius: 217px;
            padding: 0
        }

        uni-button.cuIcon.lg {
            width: 34px;
            height: 34px
        }

        .cu-btn.shadow-blur::before {
            top: 1px;
            left: 1px;
            -webkit-filter: blur(2px);
            filter: blur(2px);
            opacity: .6
        }

        .cu-btn.button-hover {
            -webkit-transform: translate(1px, 1px);
            transform: translate(1px, 1px)
        }

        .block {
            display: block
        }

        .cu-btn.block {
            display: flex
        }

        .cu-btn[disabled] {
            opacity: .6;
            color: #fff
        }

        /* ==================
          徽章
 ==================== */
        .cu-tag {
            font-size: 10px;
            vertical-align: middle;
            position: relative;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-sizing: border-box;
            padding: 0px 6px;
            height: 20px;
            font-family: Helvetica Neue, Helvetica, sans-serif;
            white-space: nowrap
        }

        .cu-tag:not([class*="bg"]):not([class*="line"]) {
            background-color: #f1f1f1
        }

        .cu-tag[class*="line-"]::after {
            content: " ";
            width: 200%;
            height: 200%;
            position: absolute;
            top: 0;
            left: 0;
            border: 1px solid currentColor;
            -webkit-transform: scale(.5);
            transform: scale(.5);
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            box-sizing: border-box;
            border-radius: inherit;
            z-index: 1;
            pointer-events: none
        }

        .cu-tag.radius[class*="line"]::after {
            border-radius: 5px
        }

        .cu-tag.round[class*="line"]::after {
            border-radius: 434px
        }

        .cu-tag[class*="line-"]::after {
            border-radius: 0
        }

        .cu-tag + .cu-tag {
            margin-left: 4px
        }

        .cu-tag.sm {
            font-size: 8px;
            padding: 0px 5px;
            height: 13px
        }

        .cu-capsule {
            display: inline-flex;
            vertical-align: middle
        }

        .cu-capsule + .cu-capsule {
            margin-left: 4px
        }

        .cu-capsule .cu-tag {
            margin: 0
        }

        .cu-capsule .cu-tag[class*="line-"]:last-child::after {
            border-left: 0px solid transparent
        }

        .cu-capsule .cu-tag[class*="line-"]:first-child::after {
            border-right: 0px solid transparent
        }

        .cu-capsule.radius .cu-tag:first-child {
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px
        }

        .cu-capsule.radius .cu-tag:last-child::after,
        .cu-capsule.radius .cu-tag[class*="line-"] {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px
        }

        .cu-capsule.round .cu-tag:first-child {
            border-top-left-radius: 86px;
            border-bottom-left-radius: 86px;
            text-indent: 1px
        }

        .cu-capsule.round .cu-tag:last-child::after,
        .cu-capsule.round .cu-tag:last-child {
            border-top-right-radius: 86px;
            border-bottom-right-radius: 86px;
            text-indent: -1px
        }

        .cu-tag.badge {
            border-radius: 86px;
            position: absolute;
            top: -4px;
            right: -4px;
            font-size: 8px;
            padding: 0px 4px;
            height: 12px;
            color: #fff
        }

        .cu-tag.badge:not([class*="bg-"]) {
            background-color: #dd514c
        }

        .cu-tag:empty:not([class*="cuIcon-"]) {
            padding: 0px;
            width: 6px;
            height: 6px;
            top: -1px;
            right: -1px
        }

        .cu-tag[class*="cuIcon-"] {
            width: 13px;
            height: 13px;
            top: -1px;
            right: -1px
        }

        /* ==================
          头像
 ==================== */
        .cu-avatar {
            font-variant: small-caps;
            margin: 0;
            padding: 0;
            display: inline-flex;
            text-align: center;
            justify-content: center;
            align-items: center;
            background-color: #ccc;
            color: #fff;
            white-space: nowrap;
            position: relative;
            width: 27px;
            height: 27px;
            background-size: cover;
            background-position: 50%;
            vertical-align: middle;
            font-size: 1.5em
        }

        .cu-avatar.sm {
            width: 20px;
            height: 20px;
            font-size: 1em
        }

        .cu-avatar.lg {
            width: 41px;
            height: 41px;
            font-size: 2em
        }

        .cu-avatar.xl {
            width: 55px;
            height: 55px;
            font-size: 2.5em
        }

        .cu-avatar .avatar-text {
            font-size: .4em
        }

        .cu-avatar-group {
            direction: rtl;
            unicode-bidi: bidi-override;
            padding: 0 4px 0 17px;
            display: inline-block
        }

        .cu-avatar-group .cu-avatar {
            margin-left: -13px;
            border: 1px solid #f1f1f1;
            vertical-align: middle
        }

        .cu-avatar-group .cu-avatar.sm {
            margin-left: -8px;
            border: 1px solid #f1f1f1
        }

        /* ==================
         进度条
 ==================== */
        .cu-progress {
            overflow: hidden;
            height: 12px;
            background-color: #ebeef5;
            display: inline-flex;
            align-items: center;
            width: 100%
        }

        .cu-progress + uni-view,
        .cu-progress + uni-text {
            line-height: 1
        }

        .cu-progress.xs {
            height: 4px
        }

        .cu-progress.sm {
            height: 8px
        }

        .cu-progress uni-view {
            width: 0;
            height: 100%;
            align-items: center;
            display: flex;
            justify-items: flex-end;
            justify-content: space-around;
            font-size: 8px;
            color: #fff;
            transition: width .6s ease
        }

        .cu-progress uni-text {
            align-items: center;
            display: flex;
            font-size: 8px;
            color: #333;
            text-indent: 4px
        }

        .cu-progress.text-progress {
            padding-right: 26px
        }

        .cu-progress.striped uni-view {
            background-image: linear-gradient(45deg, hsla(0, 0%, 100%, .15) 25%, transparent 0, transparent 50%, hsla(0, 0%, 100%, .15) 0, hsla(0, 0%, 100%, .15) 75%, transparent 0, transparent);
            background-size: 31px 31px
        }

        .cu-progress.active uni-view {
            -webkit-animation: progress-stripes 2s linear infinite;
            animation: progress-stripes 2s linear infinite
        }

        @-webkit-keyframes progress-stripes {
            from {
                background-position: 31px 0
            }
            to {
                background-position: 0 0
            }
        }

        @keyframes progress-stripes {
            from {
                background-position: 31px 0
            }
            to {
                background-position: 0 0
            }
        }

        /* ==================
          加载
 ==================== */
        .cu-load {
            display: block;
            line-height: 3em;
            text-align: center
        }

        .cu-load::before {
            font-family: cuIcon;
            display: inline-block;
            margin-right: 2px
        }

        .cu-load.loading::before {
            content: "\e67a";
            -webkit-animation: cuIcon-spin 2s infinite linear;
            animation: cuIcon-spin 2s infinite linear
        }

        .cu-load.loading::after {
            content: "加载中..."
        }

        .cu-load.over::before {
            content: "\e64a"
        }

        .cu-load.over::after {
            content: "没有更多了"
        }

        .cu-load.erro::before {
            content: "\e658"
        }

        .cu-load.erro::after {
            content: "加载失败"
        }

        .cu-load.load-cuIcon::before {
            font-size: 13px
        }

        .cu-load.load-cuIcon::after {
            display: none
        }

        .cu-load.load-cuIcon.over {
            display: none
        }

        .cu-load.load-modal {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 60px;
            left: 0;
            margin: auto;
            width: 113px;
            height: 113px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 0px 869px rgba(0, 0, 0, .5);
            display: flex;
            align-items: center;
            flex-direction: column;
            justify-content: center;
            font-size: 12px;
            z-index: 9999;
            line-height: 2.4em
        }

        .cu-load.load-modal [class*="cuIcon-"] {
            font-size: 26px
        }

        .cu-load.load-modal uni-image {
            width: 30px;
            height: 30px
        }

        .cu-load.load-modal::after {
            content: "";
            position: absolute;
            background-color: #fff;
            border-radius: 50%;
            width: 86px;
            height: 86px;
            font-size: 10px;
            border-top: 2px solid rgba(0, 0, 0, .05);
            border-right: 2px solid rgba(0, 0, 0, .05);
            border-bottom: 2px solid rgba(0, 0, 0, .05);
            border-left: 2px solid #f37b1d;
            -webkit-animation: cuIcon-spin 1s infinite linear;
            animation: cuIcon-spin 1s infinite linear;
            z-index: -1
        }

        .load-progress {
            pointer-events: none;
            top: 0;
            position: fixed;
            width: 100%;
            left: 0;
            z-index: 2000
        }

        .load-progress.hide {
            display: none
        }

        .load-progress .load-progress-bar {
            position: relative;
            width: 100%;
            height: 1px;
            overflow: hidden;
            transition: all .2s ease 0s
        }

        .load-progress .load-progress-spinner {
            position: absolute;
            top: 4px;
            right: 4px;
            z-index: 2000;
            display: block
        }

        .load-progress .load-progress-spinner::after {
            content: "";
            display: block;
            width: 10px;
            height: 10px;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border: solid 1px transparent;
            border-top-color: inherit;
            border-left-color: inherit;
            border-radius: 50%;
            -webkit-animation: load-progress-spinner .4s linear infinite;
            animation: load-progress-spinner .4s linear infinite
        }

        @-webkit-keyframes load-progress-spinner {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        @keyframes load-progress-spinner {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }

        /* ==================
          列表
 ==================== */
        .grayscale {
            -webkit-filter: grayscale(1);
            filter: grayscale(1)
        }

        .cu-list + .cu-list {
            margin-top: 13px
        }

        .cu-list > .cu-item {
            transition: all .6s ease-in-out 0s;
            -webkit-transform: translateX(0px);
            transform: translateX(0px)
        }

        .cu-list > .cu-item.move-cur {
            -webkit-transform: translateX(-113px);
            transform: translateX(-113px)
        }

        .cu-list > .cu-item .move {
            position: absolute;
            right: 0;
            display: flex;
            width: 113px;
            height: 100%;
            -webkit-transform: translateX(100%);
            transform: translateX(100%)
        }

        .cu-list > .cu-item .move uni-view {
            display: flex;
            flex: 1;
            justify-content: center;
            align-items: center
        }

        .cu-list.menu-avatar {
            overflow: hidden
        }

        .cu-list.menu-avatar > .cu-item {
            position: relative;
            display: flex;
            padding-right: 4px;
            height: 60px;
            background-color: #fff;
            justify-content: flex-end;
            align-items: center
        }

        .cu-list.menu-avatar > .cu-item > .cu-avatar {
            position: absolute;
            left: 13px
        }

        .cu-list.menu-avatar > .cu-item .flex .text-cut {
            max-width: 221px
        }

        .cu-list.menu-avatar > .cu-item .content {
            position: absolute;
            left: 63px;
            width: calc(100% - 41px - 26px - 52px - 8px);
            line-height: 1.6em
        }

        .cu-list.menu-avatar > .cu-item .content.flex-sub {
            width: calc(100% - 41px - 26px - 8px)
        }

        .cu-list.menu-avatar > .cu-item .content > uni-view:first-child {
            font-size: 13px;
            display: flex;
            align-items: center
        }

        .cu-list.menu-avatar > .cu-item .content .cu-tag.sm {
            display: inline-block;
            margin-left: 4px;
            height: 12px;
            font-size: 6px;
            line-height: 13px
        }

        .cu-list.menu-avatar > .cu-item .action {
            width: 43px;
            text-align: center
        }

        .cu-list.menu-avatar > .cu-item .action uni-view + uni-view {
            margin-top: 4px
        }

        .cu-list.menu-avatar.comment > .cu-item .content {
            position: relative;
            left: 0;
            width: auto;
            flex: 1
        }

        .cu-list.menu-avatar.comment > .cu-item {
            padding: 13px 13px 13px 52px;
            height: auto
        }

        .cu-list.menu-avatar.comment .cu-avatar {
            align-self: flex-start
        }

        .cu-list.menu > .cu-item {
            position: relative;
            display: flex;
            padding: 0 13px;
            min-height: 43px;
            background-color: #fff;
            justify-content: space-between;
            align-items: center
        }

        .cu-list.menu > .cu-item:last-child:after {
            border: none
        }

        .cu-list.menu-avatar > .cu-item:after,
        .cu-list.menu > .cu-item:after {
            position: absolute;
            top: 0;
            left: 0;
            box-sizing: border-box;
            width: 200%;
            height: 200%;
            border-bottom: 1px solid #ddd;
            border-radius: inherit;
            content: " ";
            -webkit-transform: scale(.5);
            transform: scale(.5);
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            pointer-events: none
        }

        .cu-list.menu > .cu-item.grayscale {
            background-color: #f5f5f5
        }

        .cu-list.menu > .cu-item.cur {
            background-color: #fcf7e9
        }

        .cu-list.menu > .cu-item.arrow {
            padding-right: 39px
        }

        .cu-list.menu > .cu-item.arrow:before {
            position: absolute;
            top: 0;
            right: 13px;
            bottom: 0;
            display: block;
            margin: auto;
            width: 13px;
            height: 13px;
            color: #8799a3;
            content: "\e6a3";
            text-align: center;
            font-size: 14px;
            font-family: cuIcon;
            line-height: 13px
        }

        .cu-list.menu > .cu-item uni-button.content {
            padding: 0;
            background-color: initial;
            justify-content: flex-start
        }

        .cu-list.menu > .cu-item uni-button.content:after {
            display: none
        }

        .cu-list.menu > .cu-item .cu-avatar-group .cu-avatar {
            border-color: #fff
        }

        .cu-list.menu > .cu-item .content > uni-view:first-child {
            display: flex;
            align-items: center
        }

        .cu-list.menu > .cu-item .content > uni-text[class*=cuIcon] {
            display: inline-block;
            margin-right: 4px;
            width: 1.6em;
            text-align: center
        }

        .cu-list.menu > .cu-item .content > uni-image {
            display: inline-block;
            margin-right: 4px;
            width: 1.6em;
            height: 1.6em;
            vertical-align: middle
        }

        .cu-list.menu > .cu-item .content {
            font-size: 13px;
            line-height: 1.6em;
            flex: 1
        }

        .cu-list.menu > .cu-item .content .cu-tag.sm {
            display: inline-block;
            margin-left: 4px;
            height: 12px;
            font-size: 6px;
            line-height: 13px
        }

        .cu-list.menu > .cu-item .action .cu-tag:empty {
            right: 4px
        }

        .cu-list.menu {
            display: block;
            overflow: hidden
        }

        .cu-list.menu.sm-border > .cu-item:after {
            left: 13px;
            width: calc(200% - 52px)
        }

        .cu-list.grid > .cu-item {
            position: relative;
            display: flex;
            padding: 8px 0 13px;
            transition-duration: 0s;
            flex-direction: column
        }

        .cu-list.grid > .cu-item:after {
            position: absolute;
            top: 0;
            left: 0;
            box-sizing: border-box;
            width: 200%;
            height: 200%;
            border-right: 1px solid rgba(0, 0, 0, .1);
            border-bottom: 1px solid rgba(0, 0, 0, .1);
            border-radius: inherit;
            content: " ";
            -webkit-transform: scale(.5);
            transform: scale(.5);
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            pointer-events: none
        }

        .cu-list.grid > .cu-item uni-text {
            display: block;
            margin-top: 4px;
            color: #888;
            font-size: 11px;
            line-height: 17px
        }

        .cu-list.grid > .cu-item [class*=cuIcon] {
            position: relative;
            display: block;
            margin-top: 8px;
            width: 100%;
            font-size: 20px
        }

        .cu-list.grid > .cu-item .cu-tag {
            right: auto;
            left: 50%;
            margin-left: 8px
        }

        .cu-list.grid {
            background-color: #fff;
            text-align: center
        }

        .cu-list.grid.no-border > .cu-item {
            padding-top: 4px;
            padding-bottom: 8px
        }

        .cu-list.grid.no-border > .cu-item:after {
            border: none
        }

        .cu-list.grid.no-border {
            padding: 8px 4px
        }

        .cu-list.grid.col-3 > .cu-item:nth-child(3n):after,
        .cu-list.grid.col-4 > .cu-item:nth-child(4n):after,
        .cu-list.grid.col-5 > .cu-item:nth-child(5n):after {
            border-right-width: 0
        }

        .cu-list.card-menu {
            overflow: hidden;
            margin-right: 13px;
            margin-left: 13px;
            border-radius: 8px
        }

        /* ==================
          操作条
 ==================== */
        .cu-bar {
            display: flex;
            position: relative;
            align-items: center;
            min-height: 43px;
            justify-content: space-between
        }

        .cu-bar .action {
            display: flex;
            align-items: center;
            height: 100%;
            justify-content: center;
            max-width: 100%
        }

        .cu-bar .action.border-title {
            position: relative;
            top: -4px
        }

        .cu-bar .action.border-title uni-text[class*="bg-"]:last-child {
            position: absolute;
            bottom: -.5rem;
            min-width: 2rem;
            height: 2px;
            left: 0
        }

        .cu-bar .action.sub-title {
            position: relative;
            top: -.2rem
        }

        .cu-bar .action.sub-title uni-text {
            position: relative;
            z-index: 1
        }

        .cu-bar .action.sub-title uni-text[class*="bg-"]:last-child {
            position: absolute;
            display: inline-block;
            bottom: -.2rem;
            border-radius: 2px;
            width: 100%;
            height: .6rem;
            left: .6rem;
            opacity: .3;
            z-index: 0
        }

        .cu-bar .action.sub-title uni-text[class*="text-"]:last-child {
            position: absolute;
            display: inline-block;
            bottom: -.7rem;
            left: .5rem;
            opacity: .2;
            z-index: 0;
            text-align: right;
            font-weight: 900;
            font-size: 15px
        }

        .cu-bar.justify-center .action.border-title uni-text:last-child,
        .cu-bar.justify-center .action.sub-title uni-text:last-child {
            left: 0;
            right: 0;
            margin: auto;
            text-align: center
        }

        .cu-bar .action:first-child {
            margin-left: 13px;
            font-size: 13px
        }

        .cu-bar .action uni-text.text-cut {
            text-align: left;
            width: 100%
        }

        .cu-bar .cu-avatar:first-child {
            margin-left: 8px
        }

        .cu-bar .action:first-child > uni-text[class*="cuIcon-"] {
            margin-left: -.3em;
            margin-right: .3em
        }

        .cu-bar .action:last-child {
            margin-right: 13px
        }

        .cu-bar .action > uni-text[class*="cuIcon-"],
        .cu-bar .action > uni-view[class*="cuIcon-"] {
            font-size: 15px
        }

        .cu-bar .action > uni-text[class*="cuIcon-"] + uni-text[class*="cuIcon-"] {
            margin-left: .5em
        }

        .cu-bar .content {
            position: absolute;
            text-align: center;
            width: calc(100% - 147px);
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            margin: auto;
            height: 26px;
            font-size: 13px;
            line-height: 26px;
            cursor: none;
            pointer-events: none;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden
        }

        .cu-bar.ios .content {
            bottom: 7px;
            height: 30px;
            font-size: 13px;
            line-height: 30px
        }

        .cu-bar.btn-group {
            justify-content: space-around
        }

        .cu-bar.btn-group uni-button {
            padding: 8px 13px
        }

        .cu-bar.btn-group uni-button {
            flex: 1;
            margin: 0 8px;
            max-width: 50%
        }

        .cu-bar .search-form {
            background-color: #f5f5f5;
            line-height: 27px;
            height: 27px;
            font-size: 10px;
            color: #333;
            flex: 1;
            display: flex;
            align-items: center;
            margin: 0 13px
        }

        .cu-bar .search-form + .action {
            margin-right: 13px
        }

        .cu-bar .search-form uni-input {
            flex: 1;
            padding-right: 13px;
            height: 27px;
            line-height: 27px;
            font-size: 11px;
            background-color: initial
        }

        .cu-bar .search-form [class*="cuIcon-"] {
            margin: 0 .5em 0 .8em
        }

        .cu-bar .search-form [class*="cuIcon-"]::before {
            top: 0px
        }

        .cu-bar.fixed,
        .nav.fixed {
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1024;
            box-shadow: 0 1px 2px rgba(0, 0, 0, .1)
        }

        .cu-bar.foot {
            position: fixed;
            width: 100%;
            bottom: 0;
            z-index: 1024;
            box-shadow: 0 -1px 2px rgba(0, 0, 0, .1)
        }

        .cu-bar.tabbar {
            padding: 0;
            height: calc(43px + env(safe-area-inset-bottom) / 2);
            padding-bottom: calc(env(safe-area-inset-bottom) / 2)
        }

        .cu-tabbar-height {
            min-height: 43px;
            height: calc(43px + env(safe-area-inset-bottom) / 2)
        }

        .cu-bar.tabbar.shadow {
            box-shadow: 0 -1px 2px rgba(0, 0, 0, .1)
        }

        .cu-bar.tabbar .action {
            font-size: 9px;
            position: relative;
            flex: 1;
            text-align: center;
            padding: 0;
            display: block;
            height: auto;
            line-height: 1;
            margin: 0;
            background-color: inherit;
            overflow: initial
        }

        .cu-bar.tabbar.shop .action {
            width: 60px;
            flex: initial
        }

        .cu-bar.tabbar .action.add-action {
            position: relative;
            z-index: 2;
            padding-top: 21px
        }

        .cu-bar.tabbar .action.add-action [class*="cuIcon-"] {
            position: absolute;
            width: 30px;
            z-index: 2;
            height: 30px;
            border-radius: 50%;
            line-height: 30px;
            font-size: 21px;
            top: -15px;
            left: 0;
            right: 0;
            margin: auto;
            padding: 0
        }

        .cu-bar.tabbar .action.add-action::after {
            content: "";
            position: absolute;
            width: 43px;
            height: 43px;
            top: -21px;
            left: 0;
            right: 0;
            margin: auto;
            box-shadow: 0 -1px 3px rgba(0, 0, 0, .08);
            border-radius: 21px;
            background-color: inherit;
            z-index: 0
        }

        .cu-bar.tabbar .action.add-action::before {
            content: "";
            position: absolute;
            width: 43px;
            height: 13px;
            bottom: 13px;
            left: 0;
            right: 0;
            margin: auto;
            background-color: inherit;
            z-index: 1
        }

        .cu-bar.tabbar .btn-group {
            flex: 1;
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 0 4px
        }

        .cu-bar.tabbar uni-button.action::after {
            border: 0
        }

        .cu-bar.tabbar .action [class*="cuIcon-"] {
            width: 43px;
            position: relative;
            display: block;
            height: auto;
            margin: 0 auto 4px;
            text-align: center;
            font-size: 17px
        }

        .cu-bar.tabbar .action .cuIcon-cu-image {
            margin: 0 auto
        }

        .cu-bar.tabbar .action .cuIcon-cu-image uni-image {
            width: 21px;
            height: 21px;
            display: inline-block
        }

        .cu-bar.tabbar .submit {
            align-items: center;
            display: flex;
            justify-content: center;
            text-align: center;
            position: relative;
            flex: 2;
            align-self: stretch
        }

        .cu-bar.tabbar .submit:last-child {
            flex: 2.6
        }

        .cu-bar.tabbar .submit + .submit {
            flex: 2
        }

        .cu-bar.tabbar.border .action::before {
            content: " ";
            width: 200%;
            height: 200%;
            position: absolute;
            top: 0;
            left: 0;
            -webkit-transform: scale(.5);
            transform: scale(.5);
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            border-right: 1px solid rgba(0, 0, 0, .1);
            z-index: 3
        }

        .cu-bar.tabbar.border .action:last-child:before {
            display: none
        }

        .cu-bar.input {
            padding-right: 8px;
            background-color: #fff
        }

        .cu-bar.input uni-input {
            overflow: initial;
            line-height: 27px;
            height: 27px;
            min-height: 27px;
            flex: 1;
            font-size: 13px;
            margin: 0 8px
        }

        .cu-bar.input .action {
            margin-left: 8px
        }

        .cu-bar.input .action [class*="cuIcon-"] {
            font-size: 20px
        }

        .cu-bar.input uni-input + .action {
            margin-right: 8px;
            margin-left: 0px
        }

        .cu-bar.input .action:first-child [class*="cuIcon-"] {
            margin-left: 0px
        }

        .cu-custom {
            display: block;
            position: relative
        }

        .cu-custom .cu-bar .content {
            width: calc(100% - 191px)
        }

        .cu-custom .cu-bar .content uni-image {
            height: 26px;
            width: 104px
        }

        .cu-custom .cu-bar {
            min-height: 0;


            box-shadow: 0px 0px 0px;
            z-index: 9999
        }

        .cu-custom .cu-bar .border-custom {
            position: relative;
            background: rgba(0, 0, 0, .15);
            border-radius: 434px;
            height: 30px
        }

        .cu-custom .cu-bar .border-custom::after {
            content: " ";
            width: 200%;
            height: 200%;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: inherit;
            -webkit-transform: scale(.5);
            transform: scale(.5);
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            pointer-events: none;
            box-sizing: border-box;
            border: 1px solid #fff;
            opacity: .5
        }

        .cu-custom .cu-bar .border-custom::before {
            content: " ";
            width: 1px;
            height: 110%;
            position: absolute;
            top: 22.5%;
            left: 0;
            right: 0;
            margin: auto;
            -webkit-transform: scale(.5);
            transform: scale(.5);
            -webkit-transform-origin: 0 0;
            transform-origin: 0 0;
            pointer-events: none;
            box-sizing: border-box;
            opacity: .6;
            background-color: #fff
        }

        .cu-custom .cu-bar .border-custom uni-text {
            display: block;
            flex: 1;
            margin: auto !important;
            text-align: center;
            font-size: 14px
        }

        /* ==================
         导航栏
 ==================== */
        .nav {
            white-space: nowrap
        }

        ::-webkit-scrollbar {
            display: none
        }

        .nav .cu-item {
            height: 39px;
            display: inline-block;
            line-height: 39px;
            margin: 0 4px;
            padding: 0 8px
        }

        .nav .cu-item.cur {
            border-bottom: 1px solid
        }

        /* ==================
         时间轴
 ==================== */
        .cu-timeline {
            display: block;
            background-color: #fff
        }

        .cu-timeline .cu-time {
            width: 52px;
            text-align: center;
            padding: 8px 0;
            font-size: 11px;
            color: #888;
            display: block
        }

        .cu-timeline > .cu-item {
            padding: 13px 13px 13px 52px;
            position: relative;
            display: block;
            z-index: 0
        }

        .cu-timeline > .cu-item:not([class*="text-"]) {
            color: #ccc
        }

        .cu-timeline > .cu-item::after {
            content: "";
            display: block;
            position: absolute;
            width: 1px;
            background-color: #ddd;
            left: 26px;
            height: 100%;
            top: 0;
            z-index: 8
        }

        .cu-timeline > .cu-item::before {
            font-family: cuIcon;
            display: block;
            position: absolute;
            top: 15px;
            z-index: 9;
            background-color: #fff;
            width: 21px;
            height: 21px;
            text-align: center;
            border: none;
            line-height: 21px;
            left: 15px
        }

        .cu-timeline > .cu-item:not([class*="cuIcon-"])::before {
            content: "\e763"
        }

        .cu-timeline > .cu-item[class*="cuIcon-"]::before {
            background-color: #fff;
            width: 21px;
            height: 21px;
            text-align: center;
            border: none;
            line-height: 21px;
            left: 15px
        }

        .cu-timeline > .cu-item > .content {
            padding: 13px;
            border-radius: 2px;
            display: block;
            line-height: 1.6
        }

        .cu-timeline > .cu-item > .content:not([class*="bg-"]) {
            background-color: #f1f1f1;
            color: #333
        }

        .cu-timeline > .cu-item > .content + .content {
            margin-top: 8px
        }

        /* ==================
         聊天
 ==================== */
        .cu-chat {
            display: flex;
            flex-direction: column
        }

        .cu-chat .cu-item {
            display: flex;
            padding: 13px 13px 30px;
            position: relative
        }

        .cu-chat .cu-item > .cu-avatar {
            width: 34px;
            height: 34px
        }

        .cu-chat .cu-item > .main {
            max-width: calc(100% - 113px);
            margin: 0 17px;
            display: flex;
            align-items: center
        }

        .cu-chat .cu-item > uni-image {
            height: 139px
        }

        .cu-chat .cu-item > .main .content {
            padding: 8px;
            border-radius: 2px;
            display: inline-flex;
            max-width: 100%;
            align-items: center;
            font-size: 13px;
            position: relative;
            min-height: 34px;
            line-height: 17px;
            text-align: left
        }

        .cu-chat .cu-item > .main .content:not([class*="bg-"]) {
            background-color: #fff;
            color: #333
        }

        .cu-chat .cu-item .date {
            position: absolute;
            font-size: 10px;
            color: #8799a3;
            width: calc(100% - 139px);
            bottom: 8px;
            left: 69px
        }

        .cu-chat .cu-item .action {
            padding: 0 13px;
            display: flex;
            align-items: center
        }

        .cu-chat .cu-item > .main .content::after {
            content: "";
            top: 11px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            position: absolute;
            z-index: 100;
            display: inline-block;
            overflow: hidden;
            width: 10px;
            height: 10px;
            left: -5px;
            right: auto;
            background-color: inherit
        }

        .cu-chat .cu-item.self > .main .content::after {
            left: auto;
            right: -5px
        }

        .cu-chat .cu-item > .main .content::before {
            content: "";
            top: 13px;
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);
            position: absolute;
            z-index: -1;
            display: inline-block;
            overflow: hidden;
            width: 10px;
            height: 10px;
            left: -5px;
            right: auto;
            background-color: inherit;
            -webkit-filter: blur(2px);
            filter: blur(2px);
            opacity: .3
        }

        .cu-chat .cu-item > .main .content:not([class*="bg-"])::before {
            background-color: #333;
            opacity: .1
        }

        .cu-chat .cu-item.self > .main .content::before {
            left: auto;
            right: -5px
        }

        .cu-chat .cu-item.self {
            justify-content: flex-end;
            text-align: right
        }

        .cu-chat .cu-info {
            display: inline-block;
            margin: 8px auto;
            font-size: 10px;
            padding: 3px 5px;
            background-color: rgba(0, 0, 0, .2);
            border-radius: 2px;
            color: #fff;
            max-width: 173px;
            line-height: 1.4
        }

        /* ==================
         卡片
 ==================== */
        .cu-card {
            display: block;
            overflow: hidden
        }

        .cu-card > .cu-item {
            display: block;
            background-color: #fff;
            overflow: hidden;
            border-radius: 4px;
            margin: 13px
        }

        .cu-card > .cu-item.shadow-blur {
            overflow: initial
        }

        .cu-card.no-card > .cu-item {
            margin: 0px;
            border-radius: 0px
        }

        .cu-card .grid.grid-square {
            margin-bottom: -8px
        }

        .cu-card.case .image {
            position: relative
        }

        .cu-card.case .image uni-image {
            width: 100%
        }

        .cu-card.case .image .cu-tag {
            position: absolute;
            right: 0;
            top: 0
        }

        .cu-card.case .image .cu-bar {
            position: absolute;
            bottom: 0;
            width: 100%;
            background-color: initial;
            padding: 0px 13px
        }

        .cu-card.case.no-card .image {
            margin: 13px 13px 0;
            overflow: hidden;
            border-radius: 4px
        }

        .cu-card.dynamic {
            display: block
        }

        .cu-card.dynamic > .cu-item {
            display: block;
            background-color: #fff;
            overflow: hidden
        }

        .cu-card.dynamic > .cu-item > .text-content {
            padding: 0 13px 0;
            max-height: 6.4em;
            overflow: hidden;
            font-size: 13px;
            margin-bottom: 8px
        }

        .cu-card.dynamic > .cu-item .square-img {
            width: 100%;
            height: 86px;
            border-radius: 2px
        }

        .cu-card.dynamic > .cu-item .only-img {
            width: 100%;
            height: 139px;
            border-radius: 2px
        }

        /* card.dynamic>.cu-item .comment {
  padding: 20upx;
  background-color: #f1f1f1;
  margin: 0 30upx 30upx;
  border-radius: 6upx;
} */
        .cu-card.article {
            display: block
        }

        .cu-card.article > .cu-item {
            padding-bottom: 13px
        }

        .cu-card.article > .cu-item .title {
            font-size: 13px;
            font-weight: 900;
            color: #333;
            line-height: 43px;
            padding: 0 13px
        }

        .cu-card.article > .cu-item .content {
            display: flex;
            padding: 0 13px
        }

        .cu-card.article > .cu-item .content > uni-image {
            width: 104px;
            height: 6.4em;
            margin-right: 8px;
            border-radius: 2px
        }

        .cu-card.article > .cu-item .content .desc {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between
        }

        .cu-card.article > .cu-item .content .text-content {
            font-size: 12px;
            color: #888;
            height: 4.8em;
            overflow: hidden
        }

        /* ==================
         表单
 ==================== */
        .cu-form-group {
            background-color: #fff;
            padding: 1px 13px;
            display: flex;
            align-items: center;
            min-height: 43px;
            justify-content: space-between
        }

        .cu-form-group + .cu-form-group {
            border-top: 1px solid #eee
        }

        .cu-form-group .title {
            text-align: justify;
            padding-right: 13px;
            font-size: 13px;
            position: relative;
            height: 26px;
            line-height: 26px
        }

        .cu-form-group uni-input {
            flex: 1;
            font-size: 13px;
            color: #555;
            padding-right: 8px
        }

        .cu-form-group > uni-text[class*="cuIcon-"] {
            font-size: 15px;
            padding: 0;
            box-sizing: border-box
        }

        .cu-form-group uni-textarea {
            margin: 13px 0 13px;
            height: 4.6em;
            width: 100%;
            line-height: 1.2em;
            flex: 1;
            font-size: 12px;
            padding: 0
        }

        .cu-form-group.align-start .title {
            height: 1em;
            margin-top: 13px;
            line-height: 1em
        }

        .cu-form-group uni-picker {
            flex: 1;
            padding-right: 17px;
            overflow: hidden;
            position: relative
        }

        .cu-form-group uni-picker .picker {
            line-height: 43px;
            font-size: 12px;
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden;
            width: 100%;
            text-align: right
        }

        .cu-form-group uni-picker::after {
            font-family: cuIcon;
            display: block;
            content: "\e6a3";
            position: absolute;
            font-size: 14px;
            color: #8799a3;
            line-height: 43px;
            width: 26px;
            text-align: center;
            top: 0;
            bottom: 0;
            right: -8px;
            margin: auto
        }

        .cu-form-group uni-textarea[disabled],
        .cu-form-group uni-textarea[disabled] .placeholder {
            color: transparent
        }

        /* ==================
         模态窗口
 ==================== */
        .cu-modal {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: 1110;
            opacity: 0;
            outline: 0;
            text-align: center;
            -ms-transform: scale(1.185);
            -webkit-transform: scale(1.185);
            transform: scale(1.185);
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-perspective: 869px;
            perspective: 869px;
            background: rgba(0, 0, 0, .6);
            transition: all .3s ease-in-out 0s;
            pointer-events: none
        }

        .cu-modal::before {
            content: "\200B";
            display: inline-block;
            height: 100%;
            vertical-align: middle
        }

        .cu-modal.show {
            opacity: 1;
            transition-duration: .3s;
            -ms-transform: scale(1);
            -webkit-transform: scale(1);
            transform: scale(1);
            overflow-x: hidden;
            overflow-y: auto;
            pointer-events: auto
        }

        .cu-dialog {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            margin-left: auto;
            margin-right: auto;
            width: 295px;
            max-width: 100%;
            background-color: #f8f8f8;
            border-radius: 4px;
            overflow: hidden
        }

        .cu-modal.bottom-modal::before {
            vertical-align: bottom
        }

        .cu-modal.bottom-modal .cu-dialog {
            width: 100%;
            border-radius: 0
        }

        .cu-modal.bottom-modal {
            margin-bottom: -434px
        }

        .cu-modal.bottom-modal.show {
            margin-bottom: 0
        }

        .cu-modal.drawer-modal {
            -webkit-transform: scale(1);
            transform: scale(1);
            display: flex
        }

        .cu-modal.drawer-modal .cu-dialog {
            height: 100%;
            min-width: 86px;
            border-radius: 0;
            margin: initial;
            transition-duration: .3s
        }

        .cu-modal.drawer-modal.justify-start .cu-dialog {
            -webkit-transform: translateX(-100%);
            transform: translateX(-100%)
        }

        .cu-modal.drawer-modal.justify-end .cu-dialog {
            -webkit-transform: translateX(100%);
            transform: translateX(100%)
        }

        .cu-modal.drawer-modal.show .cu-dialog {
            -webkit-transform: translateX(0);
            transform: translateX(0)
        }

        .cu-modal .cu-dialog > .cu-bar:first-child .action {
            min-width: 43px;
            margin-right: 0;
            min-height: 43px
        }

        /* ==================
         轮播
 ==================== */
        uni-swiper .a-swiper-dot {
            display: inline-block;
            width: 6px;
            height: 6px;
            background: rgba(0, 0, 0, .3);
            border-radius: 50%;
            vertical-align: middle
        }

        uni-swiper[class*="-dot"] .wx-swiper-dots,
        uni-swiper[class*="-dot"] .a-swiper-dots,
        uni-swiper[class*="-dot"] .uni-swiper-dots {
            display: flex;
            align-items: center;
            width: 100%;
            justify-content: center
        }

        uni-swiper.square-dot .wx-swiper-dot,
        uni-swiper.square-dot .a-swiper-dot,
        uni-swiper.square-dot .uni-swiper-dot {
            background-color: #fff;
            opacity: .4;
            width: 4px;
            height: 4px;
            border-radius: 8px;
            margin: 0 3px !important
        }

        uni-swiper.square-dot .wx-swiper-dot.wx-swiper-dot-active,
        uni-swiper.square-dot .a-swiper-dot.a-swiper-dot-active,
        uni-swiper.square-dot .uni-swiper-dot.uni-swiper-dot-active {
            opacity: 1;
            width: 13px
        }

        uni-swiper.round-dot .wx-swiper-dot,
        uni-swiper.round-dot .a-swiper-dot,
        uni-swiper.round-dot .uni-swiper-dot {
            width: 4px;
            height: 4px;
            position: relative;
            margin: 1px 3px !important
        }

        uni-swiper.round-dot .wx-swiper-dot.wx-swiper-dot-active::after,
        uni-swiper.round-dot .a-swiper-dot.a-swiper-dot-active::after,
        uni-swiper.round-dot .uni-swiper-dot.uni-swiper-dot-active::after {
            content: "";
            position: absolute;
            width: 4px;
            height: 4px;
            top: 0px;
            left: 0px;
            right: 0;
            bottom: 0;
            margin: auto;
            background-color: #fff;
            border-radius: 8px
        }

        uni-swiper.round-dot .wx-swiper-dot.wx-swiper-dot-active,
        uni-swiper.round-dot .a-swiper-dot.a-swiper-dot-active,
        uni-swiper.round-dot .uni-swiper-dot.uni-swiper-dot-active {
            width: 7px;
            height: 7px
        }

        .screen-swiper {
            /* min-height: 375upx; */
        }

        .screen-swiper uni-image,
        .screen-swiper uni-video,
        .swiper-item uni-image,
        .swiper-item uni-video {
            width: 100%;
            display: block;
            height: 100%;
            margin: 0;
            pointer-events: none
        }

        .card-swiper {
            height: 182px !important
        }

        .card-swiper uni-swiper-item {
            width: 265px !important;
            left: 30px;
            box-sizing: border-box;
            padding: 17px 0px 30px;
            overflow: initial
        }

        .card-swiper uni-swiper-item .swiper-item {
            width: 100%;
            display: block;
            height: 100%;
            border-radius: 4px;
            -webkit-transform: scale(.9);
            transform: scale(.9);
            transition: all .2s ease-in 0s;
            overflow: hidden
        }

        .card-swiper uni-swiper-item.cur .swiper-item {
            -webkit-transform: none;
            transform: none;
            transition: all .2s ease-in 0s
        }

        .tower-swiper {
            height: 182px;
            position: relative;
            max-width: 326px;
            overflow: hidden
        }

        .tower-swiper .tower-item {
            position: absolute;
            width: 130px;
            height: 165px;
            top: 0;
            bottom: 0;
            left: 50%;
            margin: auto;
            transition: all .2s ease-in 0s;
            opacity: 1
        }

        .tower-swiper .tower-item.none {
            opacity: 0
        }

        .tower-swiper .tower-item .swiper-item {
            width: 100%;
            height: 100%;
            border-radius: 2px;
            overflow: hidden
        }

        /* ==================
          步骤条
 ==================== */
        .cu-steps {
            display: flex
        }

        uni-scroll-view.cu-steps {
            display: block;
            white-space: nowrap
        }

        uni-scroll-view.cu-steps .cu-item {
            display: inline-block
        }

        .cu-steps .cu-item {
            flex: 1;
            text-align: center;
            position: relative;
            min-width: 43px
        }

        .cu-steps .cu-item:not([class*="text-"]) {
            color: #8799a3
        }

        .cu-steps .cu-item [class*="cuIcon-"],
        .cu-steps .cu-item .num {
            display: block;
            font-size: 17px;
            line-height: 34px
        }

        .cu-steps .cu-item::before,
        .cu-steps .cu-item::after,
        .cu-steps.steps-arrow .cu-item::before,
        .cu-steps.steps-arrow .cu-item::after {
            content: "";
            display: block;
            position: absolute;
            height: 0;
            width: calc(100% - 34px);
            border-bottom: 1px solid #ccc;
            left: calc(0px - (100% - 34px) / 2);
            top: 17px;
            z-index: 0
        }

        .cu-steps.steps-arrow .cu-item::before,
        .cu-steps.steps-arrow .cu-item::after {
            content: "\e6a3";
            font-family: cuIcon;
            height: 13px;
            border-bottom-width: 0;
            line-height: 13px;
            top: 0;
            bottom: 0;
            margin: auto;
            color: #ccc
        }

        .cu-steps.steps-bottom .cu-item::before,
        .cu-steps.steps-bottom .cu-item::after {
            bottom: 17px;
            top: auto
        }

        .cu-steps .cu-item::after {
            border-bottom: 1px solid currentColor;
            width: 0;
            transition: all .3s ease-in-out 0s
        }

        .cu-steps .cu-item[class*="text-"]::after {
            width: calc(100% - 34px);
            color: currentColor
        }

        .cu-steps .cu-item:first-child::before,
        .cu-steps .cu-item:first-child::after {
            display: none
        }

        .cu-steps .cu-item .num {
            width: 17px;
            height: 17px;
            border-radius: 50%;
            line-height: 17px;
            margin: 8px auto;
            font-size: 10px;
            border: 1px solid currentColor;
            position: relative;
            overflow: hidden
        }

        .cu-steps .cu-item[class*="text-"] .num {
            background-color: currentColor
        }

        .cu-steps .cu-item .num::before,
        .cu-steps .cu-item .num::after {
            content: attr(data-index);
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            transition: all .3s ease-in-out 0s;
            -webkit-transform: translateY(0px);
            transform: translateY(0px)
        }

        .cu-steps .cu-item[class*="text-"] .num::before {
            -webkit-transform: translateY(-17px);
            transform: translateY(-17px);
            color: #fff
        }

        .cu-steps .cu-item .num::after {
            -webkit-transform: translateY(17px);
            transform: translateY(17px);
            color: #fff;
            transition: all .3s ease-in-out 0s
        }

        .cu-steps .cu-item[class*="text-"] .num::after {
            content: "\e645";
            font-family: cuIcon;
            color: #fff;
            -webkit-transform: translateY(0px);
            transform: translateY(0px)
        }

        .cu-steps .cu-item[class*="text-"] .num.err::after {
            content: "\e646"
        }

        /* ==================
          布局
 ==================== */
        /*  -- flex弹性布局 -- */
        .flex {
            display: flex
        }

        .basis-xs {
            flex-basis: 20%
        }

        .basis-sm {
            flex-basis: 40%
        }

        .basis-df {
            flex-basis: 50%
        }

        .basis-lg {
            flex-basis: 60%
        }

        .basis-xl {
            flex-basis: 80%
        }

        .flex-sub {
            flex: 1
        }

        .flex-twice {
            flex: 2
        }

        .flex-treble {
            flex: 3
        }

        .flex-direction {
            flex-direction: column
        }

        .flex-wrap {
            flex-wrap: wrap
        }

        .align-start {
            align-items: flex-start
        }

        .align-end {
            align-items: flex-end
        }

        .align-center {
            align-items: center
        }

        .align-stretch {
            align-items: stretch
        }

        .self-start {
            align-self: flex-start
        }

        .self-center {
            align-self: flex-center
        }

        .self-end {
            align-self: flex-end
        }

        .self-stretch {
            align-self: stretch
        }

        .align-stretch {
            align-items: stretch
        }

        .justify-start {
            justify-content: flex-start
        }

        .justify-end {
            justify-content: flex-end
        }

        .justify-center {
            justify-content: center
        }

        .justify-between {
            justify-content: space-between
        }

        .justify-around {
            justify-content: space-around
        }

        /* grid布局 */
        .grid {
            display: flex;
            flex-wrap: wrap
        }

        .grid.grid-square {
            overflow: hidden
        }

        .grid.grid-square .cu-tag {
            position: absolute;
            right: 0;
            top: 0;
            border-bottom-left-radius: 2px;
            padding: 2px 5px;
            height: auto;
            background-color: rgba(0, 0, 0, .5)
        }

        .grid.grid-square > uni-view > uni-text[class*="cuIcon-"] {
            font-size: 22px;
            position: absolute;
            color: #8799a3;
            margin: auto;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column
        }

        .grid.grid-square > uni-view {
            margin-right: 8px;
            margin-bottom: 8px;
            border-radius: 2px;
            position: relative;
            overflow: hidden
        }

        .grid.grid-square > uni-view.bg-img uni-image {
            width: 100%;
            height: 100%;
            position: absolute
        }

        .grid.col-1.grid-square > uni-view {
            padding-bottom: 100%;
            height: 0;
            margin-right: 0
        }

        .grid.col-2.grid-square > uni-view {
            padding-bottom: calc((100% - 8px) / 2);
            height: 0;
            width: calc((100% - 8px) / 2)
        }

        .grid.col-3.grid-square > uni-view {
            padding-bottom: calc((100% - 17px) / 3);
            height: 0;
            width: calc((100% - 17px) / 3)
        }

        .grid.col-4.grid-square > uni-view {
            padding-bottom: calc((100% - 26px) / 4);
            height: 0;
            width: calc((100% - 26px) / 4)
        }

        .grid.col-5.grid-square > uni-view {
            padding-bottom: calc((100% - 34px) / 5);
            height: 0;
            width: calc((100% - 34px) / 5)
        }

        .grid.col-2.grid-square > uni-view:nth-child(2n),
        .grid.col-3.grid-square > uni-view:nth-child(3n),
        .grid.col-4.grid-square > uni-view:nth-child(4n),
        .grid.col-5.grid-square > uni-view:nth-child(5n) {
            margin-right: 0
        }

        .grid.col-1 > uni-view {
            width: 100%
        }

        .grid.col-2 > uni-view {
            width: 50%
        }

        .grid.col-3 > uni-view {
            width: 33.33%
        }

        .grid.col-4 > uni-view {
            width: 25%
        }

        .grid.col-5 > uni-view {
            width: 20%
        }

        /*  -- 内外边距 -- */
        .margin-0 {
            margin: 0
        }

        .margin-xs {
            margin: 4px
        }

        .margin-sm {
            margin: 8px
        }

        .margin {
            margin: 13px
        }

        .margin-lg {
            margin: 17px
        }

        .margin-xl {
            margin: 21px
        }

        .margin-top-xs {
            margin-top: 4px
        }

        .margin-top-sm {
            margin-top: 8px
        }

        .margin-top {
            margin-top: 13px
        }

        .margin-top-lg {
            margin-top: 17px
        }

        .margin-top-xl {
            margin-top: 21px
        }

        .margin-right-xs {
            margin-right: 4px
        }

        .margin-right-sm {
            margin-right: 8px
        }

        .margin-right {
            margin-right: 13px
        }

        .margin-right-lg {
            margin-right: 17px
        }

        .margin-right-xl {
            margin-right: 21px
        }

        .margin-bottom-xs {
            margin-bottom: 4px
        }

        .margin-bottom-sm {
            margin-bottom: 8px
        }

        .margin-bottom {
            margin-bottom: 13px
        }

        .margin-bottom-lg {
            margin-bottom: 17px
        }

        .margin-bottom-xl {
            margin-bottom: 21px
        }

        .margin-left-xs {
            margin-left: 4px
        }

        .margin-left-sm {
            margin-left: 8px
        }

        .margin-left {
            margin-left: 13px
        }

        .margin-left-lg {
            margin-left: 17px
        }

        .margin-left-xl {
            margin-left: 21px
        }

        .margin-lr-xs {
            margin-left: 4px;
            margin-right: 4px
        }

        .margin-lr-sm {
            margin-left: 8px;
            margin-right: 8px
        }

        .margin-lr {
            margin-left: 13px;
            margin-right: 13px
        }

        .margin-lr-lg {
            margin-left: 17px;
            margin-right: 17px
        }

        .margin-lr-xl {
            margin-left: 21px;
            margin-right: 21px
        }

        .margin-tb-xs {
            margin-top: 4px;
            margin-bottom: 4px
        }

        .margin-tb-sm {
            margin-top: 8px;
            margin-bottom: 8px
        }

        .margin-tb {
            margin-top: 13px;
            margin-bottom: 13px
        }

        .margin-tb-lg {
            margin-top: 17px;
            margin-bottom: 17px
        }

        .margin-tb-xl {
            margin-top: 21px;
            margin-bottom: 21px
        }

        .padding-0 {
            padding: 0
        }

        .padding-xs {
            padding: 4px
        }

        .padding-sm {
            padding: 8px
        }

        .padding {
            padding: 13px
        }

        .padding-lg {
            padding: 17px
        }

        .padding-xl {
            padding: 21px
        }

        .padding-top-xs {
            padding-top: 4px
        }

        .padding-top-sm {
            padding-top: 8px
        }

        .padding-top {
            padding-top: 13px
        }

        .padding-top-lg {
            padding-top: 17px
        }

        .padding-top-xl {
            padding-top: 21px
        }

        .padding-right-xs {
            padding-right: 4px
        }

        .padding-right-sm {
            padding-right: 8px
        }

        .padding-right {
            padding-right: 13px
        }

        .padding-right-lg {
            padding-right: 17px
        }

        .padding-right-xl {
            padding-right: 21px
        }

        .padding-bottom-xs {
            padding-bottom: 4px
        }

        .padding-bottom-sm {
            padding-bottom: 8px
        }

        .padding-bottom {
            padding-bottom: 13px
        }

        .padding-bottom-lg {
            padding-bottom: 17px
        }

        .padding-bottom-xl {
            padding-bottom: 21px
        }

        .padding-left-xs {
            padding-left: 4px
        }

        .padding-left-sm {
            padding-left: 8px
        }

        .padding-left {
            padding-left: 13px
        }

        .padding-left-lg {
            padding-left: 17px
        }

        .padding-left-xl {
            padding-left: 21px
        }

        .padding-lr-xs {
            padding-left: 4px;
            padding-right: 4px
        }

        .padding-lr-sm {
            padding-left: 8px;
            padding-right: 8px
        }

        .padding-lr {
            padding-left: 13px;
            padding-right: 13px
        }

        .padding-lr-lg {
            padding-left: 17px;
            padding-right: 17px
        }

        .padding-lr-xl {
            padding-left: 21px;
            padding-right: 21px
        }

        .padding-tb-xs {
            padding-top: 4px;
            padding-bottom: 4px
        }

        .padding-tb-sm {
            padding-top: 8px;
            padding-bottom: 8px
        }

        .padding-tb {
            padding-top: 13px;
            padding-bottom: 13px
        }

        .padding-tb-lg {
            padding-top: 17px;
            padding-bottom: 17px
        }

        .padding-tb-xl {
            padding-top: 21px;
            padding-bottom: 21px
        }

        /* -- 浮动 --  */
        .cf::after,
        .cf::before {
            content: " ";
            display: table
        }

        .cf::after {
            clear: both
        }

        .fl {
            float: left
        }

        .fr {
            float: right
        }

        /* ==================
          背景
 ==================== */
        .line-red::after,
        .lines-red::after {
            border-color: #e54d42
        }

        .line-orange::after,
        .lines-orange::after {
            border-color: #f37b1d
        }

        .line-yellow::after,
        .lines-yellow::after {
            border-color: #fbbd08
        }

        .line-olive::after,
        .lines-olive::after {
            border-color: #8dc63f
        }

        .line-green::after,
        .lines-green::after {
            border-color: #39b54a
        }

        .line-cyan::after,
        .lines-cyan::after {
            border-color: #1cbbb4
        }

        .line-blue::after,
        .lines-blue::after {
            border-color: #0081ff
        }

        .line-purple::after,
        .lines-purple::after {
            border-color: #6739b6
        }

        .line-mauve::after,
        .lines-mauve::after {
            border-color: #9c26b0
        }

        .line-pink::after,
        .lines-pink::after {
            border-color: #e03997
        }

        .line-brown::after,
        .lines-brown::after {
            border-color: #a5673f
        }

        .line-grey::after,
        .lines-grey::after {
            border-color: #8799a3
        }

        .line-gray::after,
        .lines-gray::after {
            border-color: #aaa
        }

        .line-black::after,
        .lines-black::after {
            border-color: #333
        }

        .line-white::after,
        .lines-white::after {
            border-color: #fff
        }

        .bg-red {
            background-color: #e54d42;
            color: #fff
        }

        .bg-orange {
            background-color: #f37b1d;
            color: #fff
        }

        .bg-yellow {
            background-color: #fbbd08;
            color: #333
        }

        .bg-olive {
            background-color: #8dc63f;
            color: #fff
        }

        .bg-green {
            background-color: #39b54a;
            color: #fff
        }

        .bg-cyan {
            background-color: #1cbbb4;
            color: #fff
        }

        .bg-blue {
            background-color: #0081ff;
            color: #fff
        }

        .bg-yellow1 {
            /* background: linear-gradient(45deg, #ff9700, rgb(231,183,36)); */
            /* background: linear-gradient(45deg,  #ff6611,#ff2111); */
            background: #6b54eb;
            color: #a9abfc
            /* color: #ffffff; */
        }

        .text-yellow1 {
            /* color: rgb(231,183,36); */
            /* color: #b83b20; */
            color: #a9abfc
        }

        .bg-purple {
            background-color: #6739b6;
            color: #fff
        }

        .bg-mauve {
            background-color: #9c26b0;
            color: #fff
        }

        .bg-pink {
            background-color: #e03997;
            color: #fff
        }

        .bg-brown {
            background-color: #a5673f;
            color: #fff
        }

        .bg-grey {
            background-color: #8799a3;
            color: #fff
        }

        .bg-gray {
            background-color: #f0f0f0;
            color: #333
        }

        .bg-black {
            background-color: #333;
            color: #fff
        }

        .bg-white {
            background-color: #fff;
            color: #666
        }

        .bg-shadeTop {
            background-image: linear-gradient(#000, rgba(0, 0, 0, .01));
            color: #fff
        }

        .bg-shadeBottom {
            background-image: linear-gradient(rgba(0, 0, 0, .01), #000);
            color: #fff
        }

        .bg-red.light {
            color: #e54d42;
            background-color: #fadbd9
        }

        .bg-orange.light {
            color: #f37b1d;
            background-color: #fde6d2
        }

        .bg-yellow.light {
            color: #fbbd08;
            background-color: rgba(254, 242, 206, .8235294117647058)
        }

        .bg-olive.light {
            color: #8dc63f;
            background-color: #e8f4d9
        }

        .bg-green.light {
            color: #39b54a;
            background-color: #d7f0db
        }

        .bg-cyan.light {
            color: #1cbbb4;
            background-color: #d2f1f0
        }

        .bg-blue.light {
            color: #0081ff;
            background-color: #cce6ff
        }

        .bg-purple.light {
            color: #6739b6;
            background-color: #e1d7f0
        }

        .bg-mauve.light {
            color: #9c26b0;
            background-color: #ebd4ef
        }

        .bg-pink.light {
            color: #e03997;
            background-color: #f9d7ea
        }

        .bg-brown.light {
            color: #a5673f;
            background-color: #ede1d9
        }

        .bg-grey.light {
            color: #8799a3;
            background-color: #e7ebed
        }

        .bg-gradual-red {
            background-image: linear-gradient(45deg, #f43f3b, #ec008c);
            color: #fff
        }

        .bg-gradual-orange {
            background-image: linear-gradient(45deg, #ff9700, #ed1c24);
            color: #fff
        }

        .bg-gradual-green {
            background-image: linear-gradient(45deg, #39b54a, #8dc63f);
            color: #fff
        }

        .bg-gradual-purple {
            background-image: linear-gradient(45deg, #9000ff, #5e00ff);
            color: #fff
        }

        .bg-gradual-pink {
            background-image: linear-gradient(45deg, #ec008c, #6739b6);
            color: #fff
        }

        .bg-gradual-blue {
            background-image: linear-gradient(45deg, #0081ff, #1cbbb4);
            color: #fff
        }

        .shadow[class*="-red"] {
            box-shadow: 2px 2px 3px rgba(204, 69, 59, .2)
        }

        .shadow[class*="-orange"] {
            box-shadow: 2px 2px 3px rgba(217, 109, 26, .2)
        }

        .shadow[class*="-yellow"] {
            box-shadow: 2px 2px 3px rgba(224, 170, 7, .2)
        }

        .shadow[class*="-olive"] {
            box-shadow: 2px 2px 3px rgba(124, 173, 55, .2)
        }

        .shadow[class*="-green"] {
            box-shadow: 2px 2px 3px rgba(48, 156, 63, .2)
        }

        .shadow[class*="-cyan"] {
            box-shadow: 2px 2px 3px rgba(28, 187, 180, .2)
        }

        .shadow[class*="-blue"] {
            box-shadow: 2px 2px 3px rgba(0, 102, 204, .2)
        }

        .shadow[class*="-purple"] {
            box-shadow: 2px 2px 3px rgba(88, 48, 156, .2)
        }

        .shadow[class*="-mauve"] {
            box-shadow: 2px 2px 3px rgba(133, 33, 150, .2)
        }

        .shadow[class*="-pink"] {
            box-shadow: 2px 2px 3px rgba(199, 50, 134, .2)
        }

        .shadow[class*="-brown"] {
            box-shadow: 2px 2px 3px rgba(140, 88, 53, .2)
        }

        .shadow[class*="-grey"] {
            box-shadow: 2px 2px 3px rgba(114, 130, 138, .2)
        }

        .shadow[class*="-gray"] {
            box-shadow: 2px 2px 3px rgba(114, 130, 138, .2)
        }

        .shadow[class*="-black"] {
            box-shadow: 2px 2px 3px rgba(26, 26, 26, .2)
        }

        .shadow[class*="-white"] {
            box-shadow: 2px 2px 3px rgba(26, 26, 26, .2)
        }

        .text-shadow[class*="-red"] {
            text-shadow: 2px 2px 3px rgba(204, 69, 59, .2)
        }

        .text-shadow[class*="-orange"] {
            text-shadow: 2px 2px 3px rgba(217, 109, 26, .2)
        }

        .text-shadow[class*="-yellow"] {
            text-shadow: 2px 2px 3px rgba(224, 170, 7, .2)
        }

        .text-shadow[class*="-olive"] {
            text-shadow: 2px 2px 3px rgba(124, 173, 55, .2)
        }

        .text-shadow[class*="-green"] {
            text-shadow: 2px 2px 3px rgba(48, 156, 63, .2)
        }

        .text-shadow[class*="-cyan"] {
            text-shadow: 2px 2px 3px rgba(28, 187, 180, .2)
        }

        .text-shadow[class*="-blue"] {
            text-shadow: 2px 2px 3px rgba(0, 102, 204, .2)
        }

        .text-shadow[class*="-purple"] {
            text-shadow: 2px 2px 3px rgba(88, 48, 156, .2)
        }

        .text-shadow[class*="-mauve"] {
            text-shadow: 2px 2px 3px rgba(133, 33, 150, .2)
        }

        .text-shadow[class*="-pink"] {
            text-shadow: 2px 2px 3px rgba(199, 50, 134, .2)
        }

        .text-shadow[class*="-brown"] {
            text-shadow: 2px 2px 3px rgba(140, 88, 53, .2)
        }

        .text-shadow[class*="-grey"] {
            text-shadow: 2px 2px 3px rgba(114, 130, 138, .2)
        }

        .text-shadow[class*="-gray"] {
            text-shadow: 2px 2px 3px rgba(114, 130, 138, .2)
        }

        .text-shadow[class*="-black"] {
            text-shadow: 2px 2px 3px rgba(26, 26, 26, .2)
        }

        .bg-img {
            background-size: cover;
            background-position: 50%;
            background-repeat: no-repeat
        }

        .bg-mask {
            background-color: #333;
            position: relative
        }

        .bg-mask::after {
            content: "";
            border-radius: inherit;
            width: 100%;
            height: 100%;
            display: block;
            background-color: rgba(0, 0, 0, .4);
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0
        }

        .bg-mask uni-view,
        .bg-mask uni-cover-view {
            z-index: 5;
            position: relative
        }

        .bg-video {
            position: relative
        }

        .bg-video uni-video {
            display: block;
            height: 100%;
            width: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            position: absolute;
            top: 0;
            z-index: 0;
            pointer-events: none
        }

        /* ==================
          文本
 ==================== */
        .text-xs {
            font-size: 8px
        }

        .text-sm {
            font-size: 10px
        }

        .text-df {
            font-size: 12px
        }

        .text-lg {
            font-size: 13px
        }

        .text-xl {
            font-size: 15px
        }

        .text-xxl {
            font-size: 19px
        }

        .text-sl {
            font-size: 34px
        }

        .text-xsl {
            font-size: 52px
        }

        .text-Abc {
            text-transform: Capitalize
        }

        .text-ABC {
            text-transform: Uppercase
        }

        .text-abc {
            text-transform: Lowercase
        }

        .text-price::before {
            content: "¥";
            font-size: 80%;
            margin-right: 1px
        }

        .text-cut {
            text-overflow: ellipsis;
            white-space: nowrap;
            overflow: hidden
        }

        .text-bold {
            font-weight: 700
        }

        .text-center {
            text-align: center
        }

        .text-content {
            line-height: 1.6
        }

        .text-left {
            text-align: left
        }

        .text-right {
            text-align: right
        }

        .text-red,
        .line-red,
        .lines-red {
            color: #e54d42
        }

        .text-orange,
        .line-orange,
        .lines-orange {
            color: #f37b1d
        }

        .text-yellow,
        .line-yellow,
        .lines-yellow {
            color: #fbbd08
        }

        .text-olive,
        .line-olive,
        .lines-olive {
            color: #8dc63f
        }

        .text-green,
        .line-green,
        .lines-green {
            color: #39b54a
        }

        .text-cyan,
        .line-cyan,
        .lines-cyan {
            color: #1cbbb4
        }

        .text-blue,
        .line-blue,
        .lines-blue {
            color: #0081ff
        }

        .text-purple,
        .line-purple,
        .lines-purple {
            color: #6739b6
        }

        .text-mauve,
        .line-mauve,
        .lines-mauve {
            color: #9c26b0
        }

        .text-pink,
        .line-pink,
        .lines-pink {
            color: #e03997
        }

        .text-brown,
        .line-brown,
        .lines-brown {
            color: #a5673f
        }

        .text-grey,
        .line-grey,
        .lines-grey {
            color: #8799a3
        }

        .text-gray,
        .line-gray,
        .lines-gray {
            color: #aaa
        }

        .text-black,
        .line-black,
        .lines-black {
            color: #333
        }

        .text-white,
        .line-white,
        .lines-white {
            color: #fff
        }

        @-webkit-keyframes cuIcon-spin {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg)
            }
        }

        @keyframes cuIcon-spin {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg)
            }
        }

        .cuIconfont-spin {
            -webkit-animation: cuIcon-spin 2s infinite linear;
            animation: cuIcon-spin 2s infinite linear;
            display: inline-block
        }

        .cuIconfont-pulse {
            -webkit-animation: cuIcon-spin 1s infinite steps(8);
            animation: cuIcon-spin 1s infinite steps(8);
            display: inline-block
        }

        [class*="cuIcon-"] {
            font-family: cuIcon;
            font-size: inherit;
            font-style: normal
        }


        .cuIcon-appreciate:before {
            content: "\e644"
        }

        .cuIcon-check:before {
            content: "\e645"
        }

        .cuIcon-close:before {
            content: "\e646"
        }

        .cuIcon-edit:before {
            content: "\e649"
        }

        .cuIcon-emoji:before {
            content: "\e64a"
        }

        .cuIcon-favorfill:before {
            content: "\e64b"
        }

        .cuIcon-favor:before {
            content: "\e64c"
        }

        .cuIcon-loading:before {
            content: "\e64f"
        }

        .cuIcon-locationfill:before {
            content: "\e650"
        }

        .cuIcon-location:before {
            content: "\e651"
        }

        .cuIcon-phone:before {
            content: "\e652"
        }

        .cuIcon-roundcheckfill:before {
            content: "\e656"
        }

        .cuIcon-roundcheck:before {
            content: "\e657"
        }

        .cuIcon-roundclosefill:before {
            content: "\e658"
        }

        .cuIcon-roundclose:before {
            content: "\e659"
        }

        .cuIcon-roundrightfill:before {
            content: "\e65a"
        }

        .cuIcon-roundright:before {
            content: "\e65b"
        }

        .cuIcon-search:before {
            content: "\e65c"
        }

        .cuIcon-taxi:before {
            content: "\e65d"
        }

        .cuIcon-timefill:before {
            content: "\e65e"
        }

        .cuIcon-time:before {
            content: "\e65f"
        }

        .cuIcon-unfold:before {
            content: "\e661"
        }

        .cuIcon-warnfill:before {
            content: "\e662"
        }

        .cuIcon-warn:before {
            content: "\e663"
        }

        .cuIcon-camerafill:before {
            content: "\e664"
        }

        .cuIcon-camera:before {
            content: "\e665"
        }

        .cuIcon-commentfill:before {
            content: "\e666"
        }

        .cuIcon-comment:before {
            content: "\e667"
        }

        .cuIcon-likefill:before {
            content: "\e668"
        }

        .cuIcon-like:before {
            content: "\e669"
        }

        .cuIcon-notificationfill:before {
            content: "\e66a"
        }

        .cuIcon-notification:before {
            content: "\e66b"
        }

        .cuIcon-order:before {
            content: "\e66c"
        }

        .cuIcon-samefill:before {
            content: "\e66d"
        }

        .cuIcon-same:before {
            content: "\e66e"
        }

        .cuIcon-deliver:before {
            content: "\e671"
        }

        .cuIcon-evaluate:before {
            content: "\e672"
        }

        .cuIcon-pay:before {
            content: "\e673"
        }

        .cuIcon-send:before {
            content: "\e675"
        }

        .cuIcon-shop:before {
            content: "\e676"
        }

        .cuIcon-ticket:before {
            content: "\e677"
        }

        .cuIcon-back:before {
            content: "\e679"
        }

        .cuIcon-cascades:before {
            content: "\e67c"
        }

        .cuIcon-discover:before {
            content: "\e67e"
        }

        .cuIcon-list:before {
            content: "\e682"
        }

        .cuIcon-more:before {
            content: "\e684"
        }

        .cuIcon-scan:before {
            content: "\e689"
        }

        .cuIcon-settings:before {
            content: "\e68a"
        }

        .cuIcon-questionfill:before {
            content: "\e690"
        }

        .cuIcon-question:before {
            content: "\e691"
        }

        .cuIcon-shopfill:before {
            content: "\e697"
        }

        .cuIcon-form:before {
            content: "\e699"
        }

        .cuIcon-pic:before {
            content: "\e69b"
        }

        .cuIcon-filter:before {
            content: "\e69c"
        }

        .cuIcon-footprint:before {
            content: "\e69d"
        }

        .cuIcon-top:before {
            content: "\e69e"
        }

        .cuIcon-pulldown:before {
            content: "\e69f"
        }

        .cuIcon-pullup:before {
            content: "\e6a0"
        }

        .cuIcon-right:before {
            content: "\e6a3"
        }

        .cuIcon-refresh:before {
            content: "\e6a4"
        }

        .cuIcon-moreandroid:before {
            content: "\e6a5"
        }

        .cuIcon-deletefill:before {
            content: "\e6a6"
        }

        .cuIcon-refund:before {
            content: "\e6ac"
        }

        .cuIcon-cart:before {
            content: "\e6af"
        }

        .cuIcon-qrcode:before {
            content: "\e6b0"
        }

        .cuIcon-remind:before {
            content: "\e6b2"
        }

        .cuIcon-delete:before {
            content: "\e6b4"
        }

        .cuIcon-profile:before {
            content: "\e6b7"
        }

        .cuIcon-home:before {
            content: "\e6b8"
        }

        .cuIcon-cartfill:before {
            content: "\e6b9"
        }

        .cuIcon-discoverfill:before {
            content: "\e6ba"
        }

        .cuIcon-homefill:before {
            content: "\e6bb"
        }

        .cuIcon-message:before {
            content: "\e6bc"
        }

        .cuIcon-addressbook:before {
            content: "\e6bd"
        }

        .cuIcon-link:before {
            content: "\e6bf"
        }

        .cuIcon-lock:before {
            content: "\e6c0"
        }

        .cuIcon-unlock:before {
            content: "\e6c2"
        }

        .cuIcon-vip:before {
            content: "\e6c3"
        }

        .cuIcon-weibo:before {
            content: "\e6c4"
        }

        .cuIcon-activity:before {
            content: "\e6c5"
        }

        .cuIcon-friendaddfill:before {
            content: "\e6c9"
        }

        .cuIcon-friendadd:before {
            content: "\e6ca"
        }

        .cuIcon-friendfamous:before {
            content: "\e6cb"
        }

        .cuIcon-friend:before {
            content: "\e6cc"
        }

        .cuIcon-goods:before {
            content: "\e6cd"
        }

        .cuIcon-selection:before {
            content: "\e6ce"
        }

        .cuIcon-explore:before {
            content: "\e6d2"
        }

        .cuIcon-present:before {
            content: "\e6d3"
        }

        .cuIcon-squarecheckfill:before {
            content: "\e6d4"
        }

        .cuIcon-square:before {
            content: "\e6d5"
        }

        .cuIcon-squarecheck:before {
            content: "\e6d6"
        }

        .cuIcon-round:before {
            content: "\e6d7"
        }

        .cuIcon-roundaddfill:before {
            content: "\e6d8"
        }

        .cuIcon-roundadd:before {
            content: "\e6d9"
        }

        .cuIcon-add:before {
            content: "\e6da"
        }

        .cuIcon-notificationforbidfill:before {
            content: "\e6db"
        }

        .cuIcon-explorefill:before {
            content: "\e6dd"
        }

        .cuIcon-fold:before {
            content: "\e6de"
        }

        .cuIcon-game:before {
            content: "\e6df"
        }

        .cuIcon-redpacket:before {
            content: "\e6e0"
        }

        .cuIcon-selectionfill:before {
            content: "\e6e1"
        }

        .cuIcon-similar:before {
            content: "\e6e2"
        }

        .cuIcon-appreciatefill:before {
            content: "\e6e3"
        }

        .cuIcon-infofill:before {
            content: "\e6e4"
        }

        .cuIcon-info:before {
            content: "\e6e5"
        }

        .cuIcon-forwardfill:before {
            content: "\e6ea"
        }

        .cuIcon-forward:before {
            content: "\e6eb"
        }

        .cuIcon-rechargefill:before {
            content: "\e6ec"
        }

        .cuIcon-recharge:before {
            content: "\e6ed"
        }

        .cuIcon-vipcard:before {
            content: "\e6ee"
        }

        .cuIcon-voice:before {
            content: "\e6ef"
        }

        .cuIcon-voicefill:before {
            content: "\e6f0"
        }

        .cuIcon-friendfavor:before {
            content: "\e6f1"
        }

        .cuIcon-wifi:before {
            content: "\e6f2"
        }

        .cuIcon-share:before {
            content: "\e6f3"
        }

        .cuIcon-wefill:before {
            content: "\e6f4"
        }

        .cuIcon-we:before {
            content: "\e6f5"
        }

        .cuIcon-lightauto:before {
            content: "\e6f6"
        }

        .cuIcon-lightforbid:before {
            content: "\e6f7"
        }

        .cuIcon-lightfill:before {
            content: "\e6f8"
        }

        .cuIcon-camerarotate:before {
            content: "\e6f9"
        }

        .cuIcon-light:before {
            content: "\e6fa"
        }

        .cuIcon-barcode:before {
            content: "\e6fb"
        }

        .cuIcon-flashlightclose:before {
            content: "\e6fc"
        }

        .cuIcon-flashlightopen:before {
            content: "\e6fd"
        }

        .cuIcon-searchlist:before {
            content: "\e6fe"
        }

        .cuIcon-service:before {
            content: "\e6ff"
        }

        .cuIcon-sort:before {
            content: "\e700"
        }

        .cuIcon-down:before {
            content: "\e703"
        }

        .cuIcon-mobile:before {
            content: "\e704"
        }

        .cuIcon-mobilefill:before {
            content: "\e705"
        }

        .cuIcon-copy:before {
            content: "\e706"
        }

        .cuIcon-countdownfill:before {
            content: "\e707"
        }

        .cuIcon-countdown:before {
            content: "\e708"
        }

        .cuIcon-noticefill:before {
            content: "\e709"
        }

        .cuIcon-notice:before {
            content: "\e70a"
        }

        .cuIcon-upstagefill:before {
            content: "\e70e"
        }

        .cuIcon-upstage:before {
            content: "\e70f"
        }

        .cuIcon-babyfill:before {
            content: "\e710"
        }

        .cuIcon-baby:before {
            content: "\e711"
        }

        .cuIcon-brandfill:before {
            content: "\e712"
        }

        .cuIcon-brand:before {
            content: "\e713"
        }

        .cuIcon-choicenessfill:before {
            content: "\e714"
        }

        .cuIcon-choiceness:before {
            content: "\e715"
        }

        .cuIcon-clothesfill:before {
            content: "\e716"
        }

        .cuIcon-clothes:before {
            content: "\e717"
        }

        .cuIcon-creativefill:before {
            content: "\e718"
        }

        .cuIcon-creative:before {
            content: "\e719"
        }

        .cuIcon-female:before {
            content: "\e71a"
        }

        .cuIcon-keyboard:before {
            content: "\e71b"
        }

        .cuIcon-male:before {
            content: "\e71c"
        }

        .cuIcon-newfill:before {
            content: "\e71d"
        }

        .cuIcon-new:before {
            content: "\e71e"
        }

        .cuIcon-pullleft:before {
            content: "\e71f"
        }

        .cuIcon-pullright:before {
            content: "\e720"
        }

        .cuIcon-rankfill:before {
            content: "\e721"
        }

        .cuIcon-rank:before {
            content: "\e722"
        }

        .cuIcon-bad:before {
            content: "\e723"
        }

        .cuIcon-cameraadd:before {
            content: "\e724"
        }

        .cuIcon-focus:before {
            content: "\e725"
        }

        .cuIcon-friendfill:before {
            content: "\e726"
        }

        .cuIcon-cameraaddfill:before {
            content: "\e727"
        }

        .cuIcon-apps:before {
            content: "\e729"
        }

        .cuIcon-paintfill:before {
            content: "\e72a"
        }

        .cuIcon-paint:before {
            content: "\e72b"
        }

        .cuIcon-picfill:before {
            content: "\e72c"
        }

        .cuIcon-refresharrow:before {
            content: "\e72d"
        }

        .cuIcon-colorlens:before {
            content: "\e6e6"
        }

        .cuIcon-markfill:before {
            content: "\e730"
        }

        .cuIcon-mark:before {
            content: "\e731"
        }

        .cuIcon-presentfill:before {
            content: "\e732"
        }

        .cuIcon-repeal:before {
            content: "\e733"
        }

        .cuIcon-album:before {
            content: "\e734"
        }

        .cuIcon-peoplefill:before {
            content: "\e735"
        }

        .cuIcon-people:before {
            content: "\e736"
        }

        .cuIcon-servicefill:before {
            content: "\e737"
        }

        .cuIcon-repair:before {
            content: "\e738"
        }

        .cuIcon-file:before {
            content: "\e739"
        }

        .cuIcon-repairfill:before {
            content: "\e73a"
        }

        .cuIcon-taoxiaopu:before {
            content: "\e73b"
        }

        .cuIcon-weixin:before {
            content: "\e612"
        }

        .cuIcon-attentionfill:before {
            content: "\e73c"
        }

        .cuIcon-attention:before {
            content: "\e73d"
        }

        .cuIcon-commandfill:before {
            content: "\e73e"
        }

        .cuIcon-command:before {
            content: "\e73f"
        }

        .cuIcon-communityfill:before {
            content: "\e740"
        }

        .cuIcon-community:before {
            content: "\e741"
        }

        .cuIcon-read:before {
            content: "\e742"
        }

        .cuIcon-calendar:before {
            content: "\e74a"
        }

        .cuIcon-cut:before {
            content: "\e74b"
        }

        .cuIcon-magic:before {
            content: "\e74c"
        }

        .cuIcon-backwardfill:before {
            content: "\e74d"
        }

        .cuIcon-playfill:before {
            content: "\e74f"
        }

        .cuIcon-stop:before {
            content: "\e750"
        }

        .cuIcon-tagfill:before {
            content: "\e751"
        }

        .cuIcon-tag:before {
            content: "\e752"
        }

        .cuIcon-group:before {
            content: "\e753"
        }

        .cuIcon-all:before {
            content: "\e755"
        }

        .cuIcon-backdelete:before {
            content: "\e756"
        }

        .cuIcon-hotfill:before {
            content: "\e757"
        }

        .cuIcon-hot:before {
            content: "\e758"
        }

        .cuIcon-post:before {
            content: "\e759"
        }

        .cuIcon-radiobox:before {
            content: "\e75b"
        }

        .cuIcon-rounddown:before {
            content: "\e75c"
        }

        .cuIcon-upload:before {
            content: "\e75d"
        }

        .cuIcon-writefill:before {
            content: "\e760"
        }

        .cuIcon-write:before {
            content: "\e761"
        }

        .cuIcon-radioboxfill:before {
            content: "\e763"
        }

        .cuIcon-punch:before {
            content: "\e764"
        }

        .cuIcon-shake:before {
            content: "\e765"
        }

        .cuIcon-move:before {
            content: "\e768"
        }

        .cuIcon-safe:before {
            content: "\e769"
        }

        .cuIcon-activityfill:before {
            content: "\e775"
        }

        .cuIcon-crownfill:before {
            content: "\e776"
        }

        .cuIcon-crown:before {
            content: "\e777"
        }

        .cuIcon-goodsfill:before {
            content: "\e778"
        }

        .cuIcon-messagefill:before {
            content: "\e779"
        }

        .cuIcon-profilefill:before {
            content: "\e77a"
        }

        .cuIcon-sound:before {
            content: "\e77b"
        }

        .cuIcon-sponsorfill:before {
            content: "\e77c"
        }

        .cuIcon-sponsor:before {
            content: "\e77d"
        }

        .cuIcon-upblock:before {
            content: "\e77e"
        }

        .cuIcon-weblock:before {
            content: "\e77f"
        }

        .cuIcon-weunblock:before {
            content: "\e780"
        }

        .cuIcon-my:before {
            content: "\e78b"
        }

        .cuIcon-myfill:before {
            content: "\e78c"
        }

        .cuIcon-emojifill:before {
            content: "\e78d"
        }

        .cuIcon-emojiflashfill:before {
            content: "\e78e"
        }

        .cuIcon-flashbuyfill:before {
            content: "\e78f"
        }

        .cuIcon-text:before {
            content: "\e791"
        }

        .cuIcon-goodsfavor:before {
            content: "\e794"
        }

        .cuIcon-musicfill:before {
            content: "\e795"
        }

        .cuIcon-musicforbidfill:before {
            content: "\e796"
        }

        .cuIcon-card:before {
            content: "\e624"
        }

        .cuIcon-triangledownfill:before {
            content: "\e79b"
        }

        .cuIcon-triangleupfill:before {
            content: "\e79c"
        }

        .cuIcon-roundleftfill-copy:before {
            content: "\e79e"
        }

        .cuIcon-font:before {
            content: "\e76a"
        }

        .cuIcon-title:before {
            content: "\e82f"
        }

        .cuIcon-recordfill:before {
            content: "\e7a4"
        }

        .cuIcon-record:before {
            content: "\e7a6"
        }

        .cuIcon-cardboardfill:before {
            content: "\e7a9"
        }

        .cuIcon-cardboard:before {
            content: "\e7aa"
        }

        .cuIcon-formfill:before {
            content: "\e7ab"
        }

        .cuIcon-coin:before {
            content: "\e7ac"
        }

        .cuIcon-cardboardforbid:before {
            content: "\e7af"
        }

        .cuIcon-circlefill:before {
            content: "\e7b0"
        }

        .cuIcon-circle:before {
            content: "\e7b1"
        }

        .cuIcon-attentionforbid:before {
            content: "\e7b2"
        }

        .cuIcon-attentionforbidfill:before {
            content: "\e7b3"
        }

        .cuIcon-attentionfavorfill:before {
            content: "\e7b4"
        }

        .cuIcon-attentionfavor:before {
            content: "\e7b5"
        }

        .cuIcon-titles:before {
            content: "\e701"
        }

        .cuIcon-icloading:before {
            content: "\e67a"
        }

        .cuIcon-full:before {
            content: "\e7bc"
        }

        .cuIcon-mail:before {
            content: "\e7bd"
        }

        .cuIcon-peoplelist:before {
            content: "\e7be"
        }

        .cuIcon-goodsnewfill:before {
            content: "\e7bf"
        }

        .cuIcon-goodsnew:before {
            content: "\e7c0"
        }

        .cuIcon-medalfill:before {
            content: "\e7c1"
        }

        .cuIcon-medal:before {
            content: "\e7c2"
        }

        .cuIcon-newsfill:before {
            content: "\e7c3"
        }

        .cuIcon-newshotfill:before {
            content: "\e7c4"
        }

        .cuIcon-newshot:before {
            content: "\e7c5"
        }

        .cuIcon-news:before {
            content: "\e7c6"
        }

        .cuIcon-videofill:before {
            content: "\e7c7"
        }

        .cuIcon-video:before {
            content: "\e7c8"
        }

        .cuIcon-exit:before {
            content: "\e7cb"
        }

        .cuIcon-skinfill:before {
            content: "\e7cc"
        }

        .cuIcon-skin:before {
            content: "\e7cd"
        }

        .cuIcon-moneybagfill:before {
            content: "\e7ce"
        }

        .cuIcon-usefullfill:before {
            content: "\e7cf"
        }

        .cuIcon-usefull:before {
            content: "\e7d0"
        }

        .cuIcon-moneybag:before {
            content: "\e7d1"
        }

        .cuIcon-redpacket_fill:before {
            content: "\e7d3"
        }

        .cuIcon-subscription:before {
            content: "\e7d4"
        }

        .cuIcon-loading1:before {
            content: "\e633"
        }

        .cuIcon-github:before {
            content: "\e692"
        }

        .cuIcon-global:before {
            content: "\e7eb"
        }

        .cuIcon-settingsfill:before {
            content: "\e6ab"
        }

        .cuIcon-back_android:before {
            content: "\e7ed"
        }

        .cuIcon-expressman:before {
            content: "\e7ef"
        }

        .cuIcon-evaluate_fill:before {
            content: "\e7f0"
        }

        .cuIcon-group_fill:before {
            content: "\e7f5"
        }

        .cuIcon-play_forward_fill:before {
            content: "\e7f6"
        }

        .cuIcon-deliver_fill:before {
            content: "\e7f7"
        }

        .cuIcon-notice_forbid_fill:before {
            content: "\e7f8"
        }

        .cuIcon-fork:before {
            content: "\e60c"
        }

        .cuIcon-pick:before {
            content: "\e7fa"
        }

        .cuIcon-wenzi:before {
            content: "\e6a7"
        }

        .cuIcon-ellipse:before {
            content: "\e600"
        }

        .cuIcon-qr_code:before {
            content: "\e61b"
        }

        .cuIcon-dianhua:before {
            content: "\e64d"
        }

        .cuIcon-cuIcon:before {
            content: "\e602"
        }

        .cuIcon-loading2:before {
            content: "\e7f1"
        }

        .cuIcon-btn:before {
            content: "\e601"
        }

        uni-page-body {
            width: 100%;
            height: 100%;
            min-height: 100vh;
            overflow-y: scroll;
            background-size: 100% 100%;
            background-repeat: no-repeat
        }

        body {
            background-size: 100% 100%;
            background-repeat: no-repeat
        }

        .item-center {
            align-items: center
        }

        .important {
            font-weight: 700;
            background: linear-gradient(180deg, #ffa900, #ff5b00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .important1 {
            font-weight: 700;
            color: #ff5b00
        }

        .empty {
            padding-top: 13px;
            color: grey;
            text-align: center
        }

        .empty uni-image {
            width: 65px;
            height: 65px
        }</style>
    <style type="text/css">.loading[data-v-74cddf96] {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: url(.{{asset('public')}}/static//loading.gif) no-repeat;
            background-size: 180px 180px;
            background-position: 50%;
            z-index: 999999
        }</style>
    <style type="text/css">.uni-app--showtabbar uni-page-wrapper {
            display: block;
            height: calc(100% - 50px);
            height: calc(100% - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 50px - env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-wrapper::after {
            content: "";
            display: block;
            width: 100%;
            height: 50px;
            height: calc(50px + constant(safe-area-inset-bottom));
            height: calc(50px + env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-head[uni-page-head-type="default"] ~ uni-page-wrapper {
            height: calc(100% - 44px - 50px);
            height: calc(100% - 44px - constant(safe-area-inset-top) - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 44px - env(safe-area-inset-top) - 50px - env(safe-area-inset-bottom));
        }</style>
    <style type="text/css">.radius[data-v-73ad995a] {
            border-radius: 13px
        }

        .radius1[data-v-73ad995a] {
            border-radius: 13px 13px 0 0
        }

        .headtop[data-v-73ad995a] {
            height: 130px;
            background-image: url(.{{asset('public')}}/static//index/topbg.png);
            background-size: 100% 100%;
            background-color: #f0f8ff
        }

        .content[data-v-73ad995a] {
            min-height: 100vh
            /* background-color: #fff; */
        }

        .cu-item1[data-v-73ad995a] {
            height: 45px;
            display: inline-block;
            margin: 0 5px;
            padding: 0 10px
        }

        .cur[data-v-73ad995a] {
            border-bottom: 2px solid #ff5b00 !important
        }</style>
    <style type="text/css">.uni-app--showtabbar uni-page-wrapper {
            display: block;
            height: calc(100% - 50px);
            height: calc(100% - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 50px - env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-wrapper::after {
            content: "";
            display: block;
            width: 100%;
            height: 50px;
            height: calc(50px + constant(safe-area-inset-bottom));
            height: calc(50px + env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-head[uni-page-head-type="default"] ~ uni-page-wrapper {
            height: calc(100% - 44px - 50px);
            height: calc(100% - 44px - constant(safe-area-inset-top) - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 44px - env(safe-area-inset-top) - 50px - env(safe-area-inset-bottom));
        }</style>
    <style type="text/css">.floor[data-v-201873ac] {
            width: 94%;
            left: 3%;
            bottom: 8px;
            background: #fff;
            display: flex;
            position: fixed;
            z-index: 999999999;
            background: #fff;
            box-shadow: 0 1px 4px rgba(36, 97, 231, .2);
            border-radius: 4.9rem
        }

        .active[data-v-201873ac] {
            font-weight: 700;
            background: linear-gradient(180deg, #ffa900, #ff5b00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent
        }

        .grey[data-v-201873ac] {
            font-weight: 700;
            color: #666
        }</style>
    <style type="text/css">.customer[data-v-299a6853] {
            width: 52px;
            height: 52px;
            -webkit-animation-name: myddd-data-v-299a6853;
            animation-name: myddd-data-v-299a6853;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-iteration-count: infinite;
            animation-iteration-count: infinite;
            position: relative
        }

        @-webkit-keyframes myddd-data-v-299a6853 {
            from {
                position: relative;
                left: -4px;
                top: -2px
            }
            to {
                position: relative;
                left: 4px;
                top: 0px
            }
        }

        @keyframes myddd-data-v-299a6853 {
            from {
                position: relative;
                left: -4px;
                top: -2px
            }
            to {
                position: relative;
                left: 4px;
                top: 0px
            }
        }</style>
    <style type="text/css">.top[data-v-9a1d55ba] {
            /* background: url('@{{asset('public')}}/static//mine/mine.png'); */
            /* height: 330upx; */
            height: 104px;
            width: 100%;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            color: #000
        }

        .toptext1[data-v-9a1d55ba] {
            font-size: 17px;
            font-weight: 500
        }

        .toptext2[data-v-9a1d55ba] {
            font-size: 13px;
            font-weight: 400
        }

        .toptext3[data-v-9a1d55ba] {
            font-size: 15px;
            font-weight: 500
        }

        .headtop[data-v-9a1d55ba] {
            border-radius: 13px;
            margin: -4px 8px 4px 8px;
            color: #fff
        }

        .headtop > uni-view:nth-child(2) uni-button[data-v-9a1d55ba] {
            width: 90%;
            font-size: 14px;
            color: #fff;
            background: #161730 !important;
            border: 1px solid #a9abfc !important
        }

        .marginbottom[data-v-9a1d55ba] {
            margin-top: -17px
        }

        .headtop > uni-view[data-v-9a1d55ba]:nth-child(1) {
            margin: 4px 4px 0 4px
        }

        .headtop > uni-view[data-v-9a1d55ba]:nth-child(2) {
            margin: 0px 4px
        }

        .headtop > uni-view[data-v-9a1d55ba] {
            border-radius: 4px;
            /* border: dashed 8upx white; */
            background: #1b1c32;
            padding: 11px;
            margin: 4px 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15)
        }

        .box-btn[data-v-9a1d55ba] {
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            /* border-radius: 30upx; */
            /* border: dashed 8upx white; */
            text-align: center
        }

        .box-btn uni-image[data-v-9a1d55ba] {
            width: 31px;
            height: 31px
        }

        .bottombox > uni-view[data-v-9a1d55ba] {
            background: #1b1c32
        }

        .logoutbox uni-button[data-v-9a1d55ba] {
            width: 70%;
            font-size: 14px;
            /* background-color: #6b54eb; */
            color: #fff !important;
            background: #161730 !important;
            border: 1px solid #a9abfc !important;
            /* color: white; */
            margin-top: 10px
        }

        .subbtn[data-v-9a1d55ba] {
            color: #fff;
            border-radius: 21px;
            background: linear-gradient(180deg, #ffa900, #ff5b00);
            border: 1px solid #ffa900 !important;
            border-radius: 34px;
            line-height: 34px;
            height: 34px
        }

        .babicon[data-v-9a1d55ba] {
            width: 50px;
            height: 50px;
            padding: 13px;
            margin: -5px 0 -5px -5px
        }

        .importanttxt[data-v-9a1d55ba] {
            color: #ffa900
        }

        .wallet .btn[data-v-9a1d55ba] {
            color: #fff;
            display: inline-block;
            height: 19px;
            line-height: 19px;
            padding: 0 13px;
            margin-top: 4px;
            font-size: 14px;
            border-radius: 21px;
            box-shadow: 1px 1px 10px #ccc;
            background: linear-gradient(180deg, #ffa900, #ff5b00)
        }

        .wallet[data-v-9a1d55ba] {
            border-radius: 4px
        }

        .wallet > uni-view[data-v-9a1d55ba] {
            padding: 4px 6px;
            border-radius: 4px;
            background: #fef8df
        }

        .wallet > uni-view[data-v-9a1d55ba]:nth-child(2) {
            padding: 4px 17px
        }

        .wallet > uni-view:nth-child(2) .btn[data-v-9a1d55ba]:nth-child(1) {
            background: #ff5b00;
            padding: 0 6px
        }

        .wallet uni-image[data-v-9a1d55ba] {
            height: 65px;
            width: 65px
        }

        .avatar[data-v-9a1d55ba] {
            /* border: 1px solid #ff5b00; */
            min-height: 56px;
            min-width: 56px;
            max-height: 56px;
            max-width: 56px;
            border-radius: 100%;
            overflow: hidden
        }

        .marginbottom > uni-view[data-v-9a1d55ba] {
            position: relative
        }

        .marginbottom > uni-view[data-v-9a1d55ba]:nth-child(1)::after {
            position: absolute;
            height: 50%;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
            content: " ";
            width: 2px;
            background: rgba(77, 77, 77, .3137254901960784);
            border-radius: 2px
        }

        .marginbottom > uni-view[data-v-9a1d55ba]:nth-child(2)::after {
            position: absolute;
            height: 50%;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            right: 0;
            content: " ";
            width: 2px;
            border-radius: 2px;
            background: rgba(77, 77, 77, .3137254901960784)
        }</style>
    <style type="text/css">.uni-app--showtabbar uni-page-wrapper {
            display: block;
            height: calc(100% - 50px);
            height: calc(100% - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 50px - env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-wrapper::after {
            content: "";
            display: block;
            width: 100%;
            height: 50px;
            height: calc(50px + constant(safe-area-inset-bottom));
            height: calc(50px + env(safe-area-inset-bottom));
        }

        .uni-app--showtabbar uni-page-head[uni-page-head-type="default"] ~ uni-page-wrapper {
            height: calc(100% - 44px - 50px);
            height: calc(100% - 44px - constant(safe-area-inset-top) - 50px - constant(safe-area-inset-bottom));
            height: calc(100% - 44px - env(safe-area-inset-top) - 50px - env(safe-area-inset-bottom));
        }</style>
    <style type="text/css">.radius[data-v-a61fab94] {
            border-radius: 4px
        }

        .radius1[data-v-a61fab94] {
            border-radius: 4px 4px 0 0
        }

        .headtop[data-v-a61fab94] {
            height: 130px;
            background-image: url({{asset('public')}}/static//index/topbg.png);
            background-size: 100% 100%;
            background-color: #f0f8ff
        }

        .content[data-v-a61fab94] {
            height: 100vh
        }

    </style>
</head>
<body class="uni-body pages-my-article">
<uni-app class="uni-app--maxwidth">
    <uni-page>
        <uni-page-wrapper>
            <uni-page-body>
                <uni-view data-v-a61fab94="" class="content flex-direction bg-white">
                    <uni-view data-v-a61fab94="" class="cu-bar padding padding-top-xl text-xl text-black flex"
                              style="position: fixed; width: 100%; top: 0px; height: 50px;">
                        <uni-view data-v-a61fab94="" class="cuIcon-back " onclick="history.go(-1)" style="flex: 1 1 0%;"></uni-view>
                        <uni-view data-v-a61fab94="" class="text-center" style="width: 80%;">Information about us
                        </uni-view>
                        <uni-view data-v-a61fab94="" class="text-right" style="flex: 1 1 0%;"></uni-view>
                    </uni-view>
                    <uni-view data-v-a61fab94="" class="headtop"></uni-view>
                    <uni-view data-v-a61fab94="" class="padding "
                              style="background-color: rgb(255, 255, 255); border-radius: 4px 4px 0px 0px; margin-top: -56px;">
                        <uni-view data-v-a61fab94="" class="padding-bottom-xl">
                            <uni-view data-v-a61fab94=""><p><strong class="ql-size-large"
                                                                    style="color: rgb(240, 102, 102);">Farmers are our
                                        priority, their success is our success. With a century of business tradition, we are
                                        well positioned to drive the agricultural industry into the future. BPIP Your
                                        Agricultural Business Partner.&#xFEFF;</strong></p>
                                <p><br></p>
                                <p><strong class="ql-size-large">&#xFEFF;</strong></p>
                                <p><br></p>
                                <p><strong class="ql-size-large" style="color: rgb(240, 102, 102);">BPIP is a leading
                                        agricultural services company, acting as a partner in the agricultural sector,
                                        providing services covering the entire grain production and storage cycle. We
                                        provide financial support and solutions as well as inputs and high-tech equipment,
                                        supported by a large retail presence. We are passionate about training new-age
                                        farmers, developing strong future farmers through the Lemang Agricultural Services
                                        training program established in 2012</strong></p>
                                <p><br></p>
                                <p><strong class="ql-size-large" style="color: rgb(240, 102, 102);">&#xFEFF;</strong>
                                </p>
                                <p><br></p>
                                <p><strong class="ql-size-large" style="color: rgb(240, 102, 102);">Our vision is to
                                        unlock the potential of agriculture not only in South Africa but in Africa and in
                                        doing so ensure successful partnerships across the continent. We have a
                                        comprehensive and in-depth understanding of agriculture in South Africa and the
                                        region. For us, this is more than just a job, it is our passion.</strong></p>
                                <p><br></p>
                                <p><br></p>
                               
                            </uni-view>
                            <uni-view data-v-a61fab94="" style="height: 95px;"></uni-view>
                        </uni-view>
                    </uni-view>
                </uni-view>
            </uni-page-body>
        </uni-page-wrapper>
    </uni-page>
</uni-app>
</body>
</html>
