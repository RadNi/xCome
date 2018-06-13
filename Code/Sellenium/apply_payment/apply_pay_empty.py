import unittest

from selenium import webdriver


# These Test could be also used by foreign payment, retrieve money

class ApplyPayment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_app_pay_empty_payee(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        price = driver.find_element_by_id("price")
        submit = driver.find_element_by_id("submit")
        price.send_keys("1000")
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_empty_price(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        payee_id = driver.find_element_by_id("payee-id")
        submit = driver.find_element_by_id("submit")
        payee_id.send_keys("1111222233334444")
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
