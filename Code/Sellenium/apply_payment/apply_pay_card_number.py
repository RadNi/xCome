import unittest

from selenium import webdriver


# These Test could be also used by foreign payment, retrieve money


class ApplyPayment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_app_pay_card_len_less(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        payee_id = driver.find_element_by_id("payee-id")
        price = driver.find_element_by_id("price")
        submit = driver.find_element_by_id("submit")
        payee_id.send_keys("111122234444")
        price.send_keys("1000")
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_card_len_more(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        payee_id = driver.find_element_by_id("payee-id")
        price = driver.find_element_by_id("price")
        submit = driver.find_element_by_id("submit")
        payee_id.send_keys("111122233334444555")
        price.send_keys("1000")
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_card_format(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        payee_id = driver.find_element_by_id("payee-id")
        price = driver.find_element_by_id("price")
        submit = driver.find_element_by_id("submit")
        payee_id.send_keys("111as34444")
        price.send_keys("1000")
        submit.click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
