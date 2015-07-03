<?php
namespace spec\Rshop\Synchronization\Pohoda;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StockSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith([
            'code' => 'CODE',
            'name' => 'NAME',
            'isSales' => '0',
            'isSerialNumber' => 'false',
            'isInternet' => true,
            'storage' => 'STORAGE',
            'typePrice' => ['id' => 1]
        ], '123');
    }

    public function it_is_initializable_and_extends_agenda()
    {
        $this->shouldHaveType('Rshop\Synchronization\Pohoda\Stock');
        $this->shouldHaveType('Rshop\Synchronization\Pohoda\Agenda');
    }

    public function it_creates_correct_xml()
    {
        $this->getXML()->shouldReturn('<stk:stock version="2.0"><stk:stockHeader><stk:stockType>card</stk:stockType><stk:code>CODE</stk:code><stk:isSales>false</stk:isSales><stk:isSerialNumber>false</stk:isSerialNumber><stk:isInternet>true</stk:isInternet><stk:name>NAME</stk:name><stk:storage><typ:ids>STORAGE</typ:ids></stk:storage><stk:typePrice><typ:id>1</typ:id></stk:typePrice></stk:stockHeader></stk:stock>');
    }

    public function it_can_set_parameters()
    {
        $this->addParameter('IsOn', 'boolean', 'true');
        $this->addParameter('VPrNum', 'number', 10.43);
        $this->addParameter('RefVPrCountry', 'list', 'SK');
        $this->addParameter('CustomList', 'list', ['id' => 5]);

        $this->getXML()->shouldReturn('<stk:stock version="2.0"><stk:stockHeader><stk:stockType>card</stk:stockType><stk:code>CODE</stk:code><stk:isSales>false</stk:isSales><stk:isSerialNumber>false</stk:isSerialNumber><stk:isInternet>true</stk:isInternet><stk:name>NAME</stk:name><stk:storage><typ:ids>STORAGE</typ:ids></stk:storage><stk:typePrice><typ:id>1</typ:id></stk:typePrice><stk:parameters><typ:parameter><typ:name>VPrIsOn</typ:name><typ:booleanValue>true</typ:booleanValue></typ:parameter><typ:parameter><typ:name>VPrNum</typ:name><typ:numberValue>10.43</typ:numberValue></typ:parameter><typ:parameter><typ:name>RefVPrCountry</typ:name><typ:listValueRef><typ:ids>SK</typ:ids></typ:listValueRef></typ:parameter><typ:parameter><typ:name>RefVPrCustomList</typ:name><typ:listValueRef><typ:id>5</typ:id></typ:listValueRef></typ:parameter></stk:parameters></stk:stockHeader></stk:stock>');
    }
}