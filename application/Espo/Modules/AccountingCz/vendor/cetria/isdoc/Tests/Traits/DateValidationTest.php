<?php

namespace Isdoc\Tests\Traits;

use PHPUnit\Framework\TestCase;

class DateValidationTest extends TestCase 

{
    use \Isdoc\Traits\DateValidation;
    
    /**
     * @test
     */
    public function testDateValidate_invalid(): void
    {
        $date = "2020-13-10";
        $this->expectException(\Exception::class);
        $this->validateDate($date);
    }
}
