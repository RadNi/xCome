import unittest

from selenium import webdriver


# These Test could be also used by all nav-butt except wallet

class ApplyPayment(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_app_pay_charge(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        charge = driver.find_element_by_id("charge")
        buy = driver.find_element_by_id("buy")
        amount = driver.find_element_by_id("amount")
        charge.click()
        amount.send_keys("1000")
        buy.click()

        assert driver.find_element_by_id("successful") is not None

    def test_app_pay_charge_empty(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        charge = driver.find_element_by_id("charge")
        buy = driver.find_element_by_id("buy")
        charge.click()
        buy.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_charge_valid_more(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        charge = driver.find_element_by_id("charge")
        buy = driver.find_element_by_id("buy")
        amount = driver.find_element_by_id("amount")
        charge.click()
        amount.send_keys("100000000000")
        buy.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_charge_valid_less(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        charge = driver.find_element_by_id("charge")
        buy = driver.find_element_by_id("buy")
        amount = driver.find_element_by_id("amount")
        charge.click()
        amount.send_keys("-100")
        buy.click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_charge_valid(self):
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/apply-pay")
        charge = driver.find_element_by_id("charge")
        buy = driver.find_element_by_id("buy")
        amount = driver.find_element_by_id("amount")
        charge.click()
        amount.send_keys("100a")
        buy.click()

        assert driver.find_element_by_id("inValid") is not None


    def tearDown(self):
        self.driver.close()
