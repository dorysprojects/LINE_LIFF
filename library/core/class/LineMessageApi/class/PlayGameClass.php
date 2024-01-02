<?php

class PlayGameClass
{

    function __construct()
    {
    }

    function __destruct()
    {
    }

    //產生52張牌
    function MakePokerCard($AssignCard = array())
    {
        $SuitIconList = array(
            "PlumFlower" => "♣",
            "Square" => "♦",
            "Heart" => "♥",
            "Spades" => "♠",
        );
        $SuitColorList = array(
            "PlumFlower" => "#404040",
            "Square" => "#ff6767",
            "Heart" => "#ff6767",
            "Spades" => "#404040",
        );
        $SuitList = array_keys($SuitIconList);
        $NumFlexList = array(
            "A"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"filler"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"filler"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"A"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"A"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "2"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"filler"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"2"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"2"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "3"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"3"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"3"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "4"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"},{"type":"filler"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"4"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"4"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "5"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"5"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"5"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "6"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"6"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"6"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "7"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"position":"absolute","width":"100%","offsetTop":"15%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"7"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"7"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "8"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetTop":"0%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetTop":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetBottom":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetBottom":"0%"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"8"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"8"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "9"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetTop":"0%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetTop":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetBottom":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetBottom":"0%"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"position":"absolute","width":"100%","offsetTop":"11%"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"9"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"9"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "10" => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetTop":"0%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetTop":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetBottom":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"offsetStart":"10%","width":"80%","position":"absolute","offsetBottom":"0%"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"position":"absolute","width":"100%","offsetTop":"11%"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","size":"3xl","align":"center"}],"position":"absolute","width":"100%","offsetBottom":"11%"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"10"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"7%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"10"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"6%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "J"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"filler"},{"type":"image","url":"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReFnzCitFJTAV4FQq3H0X_2D9UWbfxowOjyg&usqp=CAU"},{"type":"filler"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"J"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"J"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "Q"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"filler"},{"type":"image","url":"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUmmmnXABa9iIsmdOC2uvhNxn355UjD80mNw&usqp=CAU"},{"type":"filler"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"Q"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"Q"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
            "K"  => '{"type":"bubble","size":"nano","body":{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"filler"},{"type":"image","url":"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2JeVnNKTN0unOjuW87nKKNQcQhyo3xayYZQ&usqp=CAU"},{"type":"filler"}],"height":"100%","justifyContent": "space-between"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"K"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetTop":"13%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"13%","text":"K"},{"type":"text","color":"__SuitColor__","size":"lg","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}],"height":"150px","paddingAll":"0px"}}',
        );
        $SmallNumFlexList = array(
            "0"  => '{"type": "filler"}',
            // "0"  => '{"type":"box","layout":"vertical","height": "45%","contents":[]}',
            "A"  => '{"type":"box","layout":"vertical","height": "__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"filler"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"filler"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"A"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"A"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "2"  => '{"type":"box","layout":"vertical","height": "__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"filler"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"2"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"2"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "3"  => '{"type":"box","layout":"vertical","height": "__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"3"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"3"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "4"  => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"},{"type":"filler"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"4"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"4"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "5"  => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"5"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"5"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "6"  => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"6"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"6"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "7"  => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"position":"absolute","width":"100%","offsetTop":"15%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"7"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"7"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "8"  => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","offsetTop":"0%","position":"absolute"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","position":"absolute","offsetTop":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","position":"absolute","offsetBottom":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","position":"absolute","offsetBottom":"0%"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"8"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"8"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "9"  => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","offsetTop":"0%","position":"absolute"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","position":"absolute","offsetTop":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","position":"absolute","offsetBottom":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","position":"absolute","offsetBottom":"0%"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"position":"absolute","width":"100%","offsetTop":"11%"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"9"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"9"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "10" => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","offsetTop":"0%","position":"absolute"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","position":"absolute","offsetTop":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","position":"absolute","offsetBottom":"24%"},{"type":"box","layout":"horizontal","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"},{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"width":"80%","offsetStart":"10%","position":"absolute","offsetBottom":"0%"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"position":"absolute","width":"100%","offsetTop":"11%"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"__SuitIcon__","color":"__SuitColor__","align":"center"}],"position":"absolute","width":"100%","offsetBottom":"11%"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"0%","wrap":true,"text":"10"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"16%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetBottom":"20%","text":"10","offsetEnd":"0%"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "J"  => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"filler"},{"type":"image","url":"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReFnzCitFJTAV4FQq3H0X_2D9UWbfxowOjyg&usqp=CAU"},{"type":"filler"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"J"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"J"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "Q"  => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"filler"},{"type":"image","url":"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUmmmnXABa9iIsmdOC2uvhNxn355UjD80mNw&usqp=CAU"},{"type":"filler"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"Q"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"Q"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
            "K"  => '{"type":"box","layout":"vertical","height":"__HEIGHT_PERCENT__","paddingAll":"0px","borderColor":"#565656","borderWidth":"1px","cornerRadius":"5px","contents":[{"type":"box","layout":"vertical","contents":[{"type":"filler"},{"type":"image","url":"https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2JeVnNKTN0unOjuW87nKKNQcQhyo3xayYZQ&usqp=CAU"},{"type":"filler"}],"height":"100%","justifyContent":"space-between"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"3%","offsetStart":"3%","wrap":true,"text":"K"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetTop":"14%","offsetStart":"3%","wrap":true,"text":"__SuitIcon__"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"14%","text":"K"},{"type":"text","color":"__SuitColor__","size":"xxs","contents":[],"position":"absolute","offsetEnd":"3%","offsetBottom":"3%","text":"__SuitIcon__"}]}',
        );
        $NumList = array_keys($NumFlexList);
        $PokerCardList = array();
        if (!empty($AssignCard)) {
            $svalue = $AssignCard['suit'];
            $nvalue = $AssignCard['num'];
            $PokerCardList = array(
                "suit" => $svalue,
                "num" => $nvalue,
                "icon" => $SuitIconList[$svalue],
                "color" => $SuitColorList[$svalue],
                "flex" => json_decode(str_replace('__SuitColor__', $SuitColorList[$svalue], str_replace('__SuitIcon__', $SuitIconList[$svalue], $NumFlexList[$nvalue])), true),
                "small-flex" => json_decode(str_replace('__SuitColor__', $SuitColorList[$svalue], str_replace('__SuitIcon__', $SuitIconList[$svalue], $SmallNumFlexList[$nvalue])), true),
            );
        } else {
            foreach ($SuitList as $skey => $svalue) {
                foreach ($NumList as $nkey => $nvalue) {
                    $PokerCardList[] = array(
                        "suit" => $svalue,
                        "num" => $nvalue,
                    );
                }
            }
        }

        return $PokerCardList;
    }
    //發牌(依遊戲)
    function DealPokerCard($game = 'PickRedDots', $num = 2)
    {
        $PlayersCard = array();
        if ($num >= 2 && $num <= 4) {
            $PokerCards = $this->MakePokerCard();
            shuffle($PokerCards);
            switch ($game) {
                case 'BigTwo':
                    $PlayersCard = array_chunk($PokerCards, floor(52 / $num));
                    if ($num == 3) {
                        $PlayersCard[rand(0, 2)][] = $PlayersCard[3][0];
                        unset($PlayersCard[3]);
                        $PlayersCard = array_values($PlayersCard);
                    }
                    break;
                case 'PickRedDots':
                    $PlayersCard['players'] = array_chunk(array_slice($PokerCards, 0, 24), floor(24 / $num));
                    $PlayersCard['side'] = array_slice($PokerCards, 24, 4);
                    $PlayersCard['middle'] = array_slice($PokerCards, 28);
                    break;
            }
        }
        return $PlayersCard;
    }
    //是否可以配對「A、9」，「2、8」，「3、7」，「4、6」，「5、5」，「10、10」，「J、J」，「Q、Q」，「K、K」
    function CheckRule($UserCard = array(), $SideCards = array())
    {
        $CheckFlag = array();
        if (!empty($UserCard['num']) && !empty($SideCards)) {
            foreach ($SideCards as $ckey => $Card) {
                switch ($UserCard['num']) {
                    case 'A':
                    case '2':
                    case '3':
                    case '4':
                    case '5':
                    case '6':
                    case '7':
                    case '8':
                    case '9':
                        $UserCardPoint = ($UserCard['num'] == 'A') ? 1 : intval($UserCard['num']);
                        $CardPoint = ($Card['num'] == 'A') ? 1 : intval($Card['num']);
                        if (($UserCardPoint + $CardPoint) == 10) {
                            $CheckFlag = $Card;
                            break;
                        }
                        break;
                    case '10':
                    case 'J':
                    case 'Q':
                    case 'K':
                        if ($UserCard['num'] == $Card['num']) {
                            $CheckFlag = $Card;
                            break;
                        }
                        break;
                }
            }
        }
        return $CheckFlag;
    }
    //計算 單張卡片 多少點數
    function GetRedDotPoints($AssignCardTmp = array())
    {
        $Point = 0;
        if (!empty($AssignCardTmp)) {
            if(is_array($AssignCardTmp)){
                $AssignCard = $AssignCardTmp;
            }else{
                $AssignCardTmpExplode = explode('-', $AssignCardTmp);
                $AssignCard['suit'] = $AssignCardTmpExplode[0];
                $AssignCard['num'] = $AssignCardTmpExplode[1];
            }
            switch ($AssignCard['suit']) {
                case 'Square':
                case 'Heart':
                    switch (strval($AssignCard['num'])) {
                        case 'A':
                            $Point = 20;
                            break;
                        case '9':
                        case '10':
                        case 'J':
                        case 'Q':
                        case 'K':
                            $Point = 10;
                            break;
                        default:
                            $Point = $AssignCard['num'];
                            break;
                    }
                    break;
            }
        }
        return intval($Point);
    }
    //算一組牌總共多少分
    function CountPoints($CardList = array()){
        $TotalPoints = 0;
        if(!empty($CardList)){
            foreach ($CardList as $key => $card) {
                $TotalPoints += $this->GetRedDotPoints($card);
            }
        }
        return $TotalPoints;
    }
    //取得 有配對且最高點數、沒有配對隨機
    function GetHighestPair($cards = array(), $PlayerCards = array())
    {
        if (!empty($cards) && !empty($PlayerCards)) {
            return $PlayerCards[array_rand($PlayerCards)];
            // $PointsCardList = array();
            // $MaxPointNumList = array();
            // foreach ($cards as $ckey => $card) {
            //     $CheckRule = $this->CheckRule($card);
            //     if ($CheckRule != -1) {
            //         $point = $this->GetRedDotPoints($CheckRule);
            //         $item = array(
            //             "num" => $CheckRule,
            //             "point" => $point,
            //         );
            //         $PointsCardList[] = $item;
            //         if (empty($MaxPointNumList) || $point > $MaxPointNumList[0]['point']) {
            //             $MaxPointNumList[] = $item;
            //         }
            //     }
            // }
            // if (!empty($MaxPointNumList)) {
            //     return $MaxPointNumList[array_rand(array_column($MaxPointNumList, 'num'))];
            // } else {
            //     return $cards[array_rand($cards)];
            // }
        }
    }
    //移除「牌組」中「某」張牌
    function RemovePlayerCard($card = array(), $PlayerCards = array())
    {
        if (!empty($card) && !empty($PlayerCards)) {
            foreach ($PlayerCards as $key => $value) {
                if ($value['suit'] == $card['suit'] && $value['num'] == $card['num']) {
                    unset($PlayerCards[$key]);
                    break;
                }
            }
            $PlayerCards = array_values($PlayerCards);
        }
        return $PlayerCards;
    }
    //重新排序
    function SuitNumSort($CardsTmp = array(), $Action = 'Side')
    {
        if (!function_exists('Sub_SuitNumSort')){ 
            function Sub_SuitNumSort($a = NULL, $b = NULL)
            {
                $NumPointList = array("A" => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10, "J" => 11, "Q" => 12, "K" => 13);
                $SuitPointList = array("PlumFlower" => 1, "Square" => 2, "Heart" => 3, "Spades" => 4);
                if ($NumPointList[$a['num']] > $NumPointList[$b['num']]) {
                    return 1;
                } else if (($NumPointList[$a['num']] == $NumPointList[$b['num']]) && ($SuitPointList[$a['suit']] > $SuitPointList[$b['suit']])) {
                    return 1;
                }
            }
        }
        $Cards = array();
        switch ($Action) {
            case 'Box':
                if (!empty($CardsTmp)) {
                    foreach ($CardsTmp as $skey => $SuitNumTmp) {
                        $SuitNum = explode('-', $SuitNumTmp);
                        $Cards[] = array("suit" => $SuitNum[0], "num" => $SuitNum[1]);
                    }
                } else {
                    $Cards = $CardsTmp;
                }
                break;
            case 'Side':
                $Cards = $CardsTmp;
                break;
        }

        usort($Cards, 'Sub_SuitNumSort');
        return $Cards;
    }
    //產生底牌
    function GetSideCard($SideCardTmp = array(), $Action = 'Side')
    {
        switch ($Action) {
            case 'End':
                $FlexTmp = '{"type":"bubble","size":"giga","body":{"type":"box","layout":"horizontal","justifyContent":"center","spacing":"md","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"text","text":"我方","align":"center","color":"#ffffff"}],"backgroundColor":"#c9b99c"},{"type":"box","layout":"horizontal","contents":["__Player1WinBlock__",{"type":"text","text":"__Player1Point__","size":"4xl","color":"#976711","align":"end"}],"alignItems":"center"}],"flex":2},{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[],"width":"2px","backgroundColor":"#bbbbbb","height":"100%"}],"flex":1,"spacing":"sm","alignItems":"center"},{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"text","text":"對方","align":"center","color":"#ffffff"}],"backgroundColor":"#90cfc9"},{"type":"box","layout":"horizontal","contents":["__Player2WinBlock__",{"type":"text","text":"__Player2Point__","size":"4xl","color":"#14786f","align":"end"}],"alignItems":"center"}],"flex":2}],"paddingAll":"10px"}}';
                break;
            case 'Box':
                $FlexTmp = '{"type":"bubble","size":"giga","body":{"type":"box","layout":"horizontal","justifyContent":"center","spacing":"md","contents":[{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"text","text":"我方","align":"center","color":"#ffffff"}],"backgroundColor":"#c9b99c"},{"type":"box","layout":"horizontal","contents":[{"type":"box","layout":"vertical","spacing":"sm","contents":[{"type":"text","text":"出牌","align":"center","size":"xxs","color":"#976711"}]},{"type":"box","layout":"vertical","spacing":"sm","contents":[{"type":"text","text":"翻牌","align":"center","size":"xxs","color":"#976711"}]}],"spacing":"sm"},{"type":"box","layout":"horizontal","contents":["__CARD_BLOCK__","__CARD_BLOCK__"],"spacing":"sm"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"吃牌","align":"center","size":"xxs","margin":"xs","color":"#976711"}]},{"type":"box","layout":"horizontal","contents":["__CARD_BLOCK__","__CARD_BLOCK__"],"spacing":"sm"}],"flex":2},{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[],"width":"2px","backgroundColor":"#bbbbbb","height":"100%"}],"flex":1,"spacing":"sm","alignItems":"center"},{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[{"type":"text","text":"對方","align":"center","color":"#ffffff"}],"backgroundColor":"#90cfc9"},{"type":"box","layout":"horizontal","contents":[{"type":"box","layout":"vertical","spacing":"sm","contents":[{"type":"text","text":"出牌","align":"center","size":"xxs","color":"#14786f"}]},{"type":"box","layout":"vertical","spacing":"sm","contents":[{"type":"text","text":"翻牌","align":"center","size":"xxs","color":"#14786f"}]}],"spacing":"sm"},{"type":"box","layout":"horizontal","contents":["__CARD_BLOCK__","__CARD_BLOCK__"],"spacing":"sm"},{"type":"box","layout":"vertical","contents":[{"type":"text","text":"吃牌","align":"center","size":"xxs","margin":"xs","color":"#14786f"}]},{"type":"box","layout":"horizontal","contents":["__CARD_BLOCK__","__CARD_BLOCK__"],"spacing":"sm"}],"flex":2}],"paddingAll":"10px"}}';
                $HEIGHT_PERCENT = '87.5px';
                $SideCard = $SideCardTmp;
                break;
            case 'Side':
                $FlexTmp = '{"type":"bubble","size":"giga","body":{"type":"box","layout":"vertical","paddingAll":"10px","contents":[{"type":"box","layout":"horizontal","justifyContent":"center","spacing":"md","contents":[{"type":"box","layout":"vertical","flex":1,"spacing":"sm","contents":["__CARD_BLOCK__"]},{"type":"box","layout":"vertical","flex":1,"spacing":"sm","contents":["__CARD_BLOCK__"]},{"type":"box","layout":"vertical","contents":[{"type":"box","layout":"vertical","contents":[],"backgroundColor":"#565656","cornerRadius":"5px","height":"45%","width":"100%"}],"flex":1,"height":"175px","justifyContent":"center","alignItems":"center"},{"type":"box","layout":"vertical","flex":1,"spacing":"sm","contents":["__CARD_BLOCK__"]},{"type":"box","layout":"vertical","flex":1,"spacing":"sm","contents":["__CARD_BLOCK__"]}]}]}}';
                $MIDDLE_HEIGHT = 87.5;
                $LevelTmp = count(array_chunk($SideCardTmp, 4));
                $Level = ($LevelTmp<2) ? 2 : $LevelTmp;
                $FlexBlock = explode('"__CARD_BLOCK__"', $FlexTmp);
                if (!empty($FlexBlock)) {
                    $FlexJson = '';
                    foreach ($FlexBlock as $key => $value) {
                        $FlexJson .= $value;
                        for ($u = 0; $u < $Level; $u++) {
                            if ($key != (count($FlexBlock) - 1)) {
                                $FlexJson .= ($u != 0) ? ',' : '';
                                $FlexJson .= '"__CARD_BLOCK__"';
                            }
                        }
                    }
                    $FlexTmp = $FlexJson;
                }
                $FlexTmp = str_replace('__MIDDLE_HEIGHT__', strval($MIDDLE_HEIGHT * $Level) . 'px', $FlexTmp);
                $HEIGHT_PERCENT = (floor(100 / $Level) - 1) . '%';

                // $HEIGHT_PERCENT = '49%';
                $SideCard = $SideCardTmp;
                break;
        }
        switch($Action){
            case 'End':
                $WinBlock = '{"type":"text","text":"♕","size":"3xl","align":"start","color":"#f7c537","position":"absolute"},';
                $Player1Point = $SideCardTmp[0];
                $Player2Point = $SideCardTmp[1];
                $Player1WinBlock = ($Player1Point >= $Player2Point) ? $WinBlock : '';
                $Player2WinBlock = ($Player2Point >= $Player1Point) ? $WinBlock : '';
                $FlexTmp = str_replace('"__Player2WinBlock__",', $Player2WinBlock, str_replace('"__Player1WinBlock__",', $Player1WinBlock, $FlexTmp));
                $FlexJson = str_replace('__Player2Point__', $Player2Point, str_replace('__Player1Point__', $Player1Point, $FlexTmp));
                break;
            default:
                $FlexBlock = explode('"__CARD_BLOCK__"', $FlexTmp);
                if (!empty($FlexBlock)) {
                    $FlexJson = '';
                    foreach ($FlexBlock as $key => $value) {
                        $FlexJson .= $value;
                        if ($key != (count($FlexBlock) - 1)) {
                            switch ($Action) {
                                case 'Box':
                                    $ConvertKey = $key;
                                    break;
                                case 'Side':
                                    $ConvertList = array(
                                        0 => 4, 1 => 5, 2 => 0, 3 => 1,
                                        4 => 2, 5 => 3, 6 => 6, 7 => 7,
                                    );
                                    $ConvertKey = ($key<8) ? $ConvertList[$key] : $key;
                                    break;
                            }
                            $card = ($SideCard[$ConvertKey]) ? $SideCard[$ConvertKey] : array("suit" => "none", "num" => "0");
                            $FlexJson .= str_replace('__HEIGHT_PERCENT__', $HEIGHT_PERCENT, json_encode($this->MakePokerCard($card)["small-flex"]));
                        }
                    }
                } else {
                    $FlexJson = json_encode($FlexBlock);
                }
                break;
        }
        
        return json_decode($FlexJson, true);
    }

    function GetBingoList($List = array())
    {
        if (!empty($List)) {
            $Length = 5;
            $Bingo = array();
            $Bingo['verticals'] = array_chunk($List, $Length);
            foreach ($Bingo['verticals'] as $key => $value) {
                for ($i = 0; $i < 5; $i++) {
                    $Bingo['horizontals'][$i][] = $value[$i];
                }
                $Bingo['obliques'][0][] = $Bingo['verticals'][$key][$key];
                $Bingo['obliques'][1][] = $Bingo['verticals'][$key][$Length - $key - 1];
            }
            return array_merge($Bingo['verticals'], $Bingo['horizontals'], $Bingo['obliques']);
        }
    }
    function CheckBingoCtn($List = array(), $item = array(), $OptimizeFlag = 0, $Level = 'normal')
    {
        $BingoCtn = 0;
        if (!empty($List) && !empty($item)) {
            if ($OptimizeFlag) {
                $Remain = array();
                $Diff_Length_List = array();
            }
            foreach ($List as $key => $value) {
                $Diff = array_diff($value, $item);
                $Diff_Length = count($Diff);
                if ($Diff_Length == 0) {
                    $BingoCtn++;
                } else if ($OptimizeFlag) {
                    $Remain = array_merge($Remain, $Diff);
                    $Diff_Length_List[$key] = $Diff_Length;
                }
            }
            if ($OptimizeFlag) {
                switch ($Level) {
                    case 'easy':
                        $OptimizedValue = $Remain[array_rand(array_values(array_unique($Remain)))];
                        break;
                    case 'normal':
                        $DiffMin = min($Diff_Length_List);
                        $DiffMinList = array_filter($Diff_Length_List, function ($d) use ($DiffMin) {
                            return $d == $DiffMin;
                        });
                        $DiffMinRand = array_values(array_diff($List[array_rand($DiffMinList)], $item));
                        $OptimizedValue = $DiffMinRand[array_rand($DiffMinRand)];
                        break;
                    case 'hard':
                        $DiffMin = min($Diff_Length_List);
                        $DiffMinList = array_filter($Diff_Length_List, function ($d) use ($DiffMin) {
                            return $d == $DiffMin;
                        });
                        $DiffMinRand = array_values(array_diff($List[array_rand($DiffMinList)], $item));
                        $RemainCtn = array_count_values(array_filter($Remain, function ($r) use ($DiffMinRand) {
                            return $DiffMinRand && in_array($r, $DiffMinRand);
                        }));
                        $RemainMax = max($RemainCtn);
                        $RemainMaxList = array_filter($RemainCtn, function ($rc) use ($RemainMax) {
                            return $rc == $RemainMax;
                        });
                        $OptimizedValue = array_rand($RemainMaxList);
                        break;
                }
            }
        }
        return array($BingoCtn, $OptimizedValue);
    }

    function GetRandNum_1A2B()
    {
        $UseNum = array();
        $Answer = "";
        for ($i = 0; $i < 4; $i++) {
            $Rand = rand(0, 9);
            if ($UseNum && in_array($Rand, $UseNum)) {
                $i--;
            } else {
                $UseNum[] = $Rand;
                $Answer .= $Rand;
            }
        }
        return $Answer;
    }

    function TryCtnSort_Leaderboard($TryCtnBox = NULL)
    {
        if (!function_exists('Sub_TryCtnSort_Leaderboard')){
            function Sub_TryCtnSort_Leaderboard($a, $b)
            {
                if ($a['TryCtn'] > $b['TryCtn']) {
                    return 1;
                }
            }
        }

        usort($TryCtnBox, 'Sub_TryCtnSort_Leaderboard');
        return $TryCtnBox;
    }
}
