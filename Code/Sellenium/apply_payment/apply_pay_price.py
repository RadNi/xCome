import unittest

from selenium import webdriver


# These Test could be also used by foreign payment, retrieve money


class ApplyPayment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_app_pay_price_format(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        payee_id = driver.find_element_by_id("payee-id")
        price = driver.find_element_by_id("price")
        submit = driver.find_element_by_id("submit")
        payee_id.send_keys("111122234444")
        price.send_keys("100s0")
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_price_range(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        payee_id = driver.find_element_by_id("payee-id")
        price = driver.find_element_by_id("price")
        submit = driver.find_element_by_id("submit")
        payee_id.send_keys("111122234444")
        price.send_keys("-10")
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
