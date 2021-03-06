<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Jcowie_Tracking_Block_CodeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Jcowie_Tracking_Block_Code');
    }

    function let(\Jcowie_Tracking_Adapter_Config $adapter)
    {
        $this->beConstructedWith(array('config_adapter' => $adapter));
    }

    function it_should_return_enabled_tracking_code_for_header($adapter)
    {
        $sampleScript = '<script>someTrackingCode</script>';

        $adapter->getHeadTrackingCode('jcowie_tracking/code', 1)
            ->willReturn($sampleScript);

        $this->getHeadTrackingCode()->shouldReturn($sampleScript);
    }

    function it_should_return_false_if_not_tracking_is_enabled($adapter)
    {
        $adapter->getHeadTrackingCode('jcowie_tracking/code', 1)->willReturn(false);
        $this->getHeadTrackingCode()->shouldReturn(false);
    }

}
