<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\TestResponse;
use Symfony\Component\DomCrawler\Crawler;

/**
 * @internal
 */
abstract class ApplicationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @param array<string, mixed> $inputValues
     * @param array<string, mixed> $expectedInputValues
     */
    protected function testFormOnPage(
        TestResponse $response,
        string $formId,
        array $inputValues,
        array $expectedInputValues = [],
    ): void {
        $content = $response->getContent();
        if (!$content) {
            $this->fail('No response content');
        }

        $crawler = new Crawler($content);
        $form = $crawler->filterXPath("//form[@id='{$formId}']")->form();
        $currentValues = $form->getValues();
        $checkedValues = [];

        foreach ($inputValues as $inputName => $value) {
            $inputNameSelector = "//*[local-name() = 'input' or local-name() = 'textarea' or local-name = 'select'][@name=\"{$inputName}\"]";
            $inputElement = $crawler->filterXPath($inputNameSelector);
            $this->assertGreaterThan(
                0,
                $inputElement->count(),
                "No element found with Xpath selector '{$inputNameSelector}'."
            );

            $expectedValue = $expectedInputValues[$inputName] ?? false;
            if ($expectedValue) {
                $this->assertEquals($expectedValue, $currentValues[$inputName]);
                $checkedValues[] = $inputName;
            }
        }

        $expectedKeys = array_keys($inputValues);
        $diff = array_diff($checkedValues, $expectedKeys);
        $this->assertEmpty($diff);

        $form->setValues($inputValues);

        $formResponse = $this->post($form->getUri(), $form->getValues());
        $this->assertGreaterThanOrEqual(200, $formResponse->getStatusCode());
        $this->assertLessThan(400, $formResponse->getStatusCode());
    }
}
