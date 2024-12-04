<?
namespace SassLaravel\LaravelEnumsToJson;

#[EnumToJson]
enum TestEnum: int {
    case Test1 = 0;
    case Test2 = 1;
    case Test3 = 5;
}
