<?php

namespace DataSource;

use Data\Post;

class PostDataSource
{
    private static $data;

    public static function init()
    {
        self::$data = [
            "1" => new Post("1", "first season", "私立パプリカ学園に通う小学5年生の女の子・真中らぁらは誰でもアイドルになれるテーマパーク・プリパラタウンへの招待券であるプリチケが届くのを心待ちにしていた。しかし、パプリカ学園では小学部校長の方針で小学生のプリパラは厳禁、プリチケは見つかり次第没収されてしまう。", "3"),
            "2" => new Post("2", "second season", "プリパラに新しいエリア「ドリームシアター」が完成し、四季のプリンセスを決めるべく年四回アイドルドリームグランプリを開催することが発表された。グランプリ参加者はチャームを渡されて参加することとなる。そこに黒須あろまと白玉みかんの二人からなるユニット・アロマゲドンが現れる。一度リセットされたSoLaMi♡SMILEとDressingPaféを招き入れようとするも不発に終わり、それぞれのチームとして引き続き活動することとなる。", "2"),
            "3" => new Post("3", "third season", "パラ宿のプリパラで神アイドルグランプリが開催されることが決定し、らぁら達は神アイドルを目指してこれに参加する決意を固める。同時にらぁらは突然プリパラタウンに現れた謎の赤ちゃん、ジュルルを拾い、みれぃ達と協力して世話をすることになった。この赤ちゃんこそ、神アイドル誕生の鍵を握る女神、ジュリィの仮の姿であった。らぁら達は、ジュルルを元のジュリィに戻すため奮闘することになる。", "1"),
            "4" => new Post("4", "4th season", "アイドルに憧れる私立アボカド学園の小学6年生・夢川ゆいが住むパパラ宿の街に、新しくプリパラがオープンすることになった。ゆいは早速私立アボカド学園に転校してきた神アイドル・真中らぁらとともにプリパラタウンに入るが、らぁらはプリパラチェンジした姿ではなくゆいと同じ小学6年生の普通の少女の姿であった。システムエラーでプリパラチェンジが出来なくなってしまったらぁらはゆいと意気投合し、パパラ宿のプリパラを盛り上げるべく奮闘する。", "1"),
        ];
    }

    public static function getList(): array
    {
        return self::$data;
    }

    public static function popularList(): array
    {
        return [self::$data["4"], self::$data["3"], self::$data["1"],];
    }

    public static function getById(string $id): Post
    {
        if (self::$data[$id]) {
            return self::$data[$id];
        }
        throw new \RuntimeException('Not Found');
    }
}
