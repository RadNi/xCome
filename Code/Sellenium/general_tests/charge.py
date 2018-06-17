import unittest

from selenium import webdriver

from test_utility import static_data, fields


# These Test could be also used by all pages have charge

class Charge(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()
        self.address = "user/profile"

    def test_app_pay_charge(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        components = fields.get_components_by_name(driver, ["charge", "amount", "buy"])
        components[0].click()
        components[1].send_keys("1000")
        components[2].click()

        assert driver.find_element_by_id("successful") is not None

    def test_app_pay_charge_empty(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        components = fields.get_components_by_name(driver, ["charge", "buy"])
        components[0].click()
        components[1].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_charge_too_much(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        components = fields.get_components_by_name(driver, ["charge", "amount", "buy"])
        components[0].click()
        components[1].send_keys("100000000")
        components[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_charge_too_low(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        components = fields.get_components_by_name(driver, ["charge", "amount", "buy"])
        components[0].click()
        components[1].send_keys("1")
        components[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_charge_negative(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        components = fields.get_components_by_name(driver, ["charge", "amount", "buy"])
        components[0].click()
        components[1].send_keys("-1000")
        components[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def test_app_pay_charge_format(self):
        driver = self.driver
        driver.get(static_data.base_url + self.address)
        components = fields.get_components_by_name(driver, ["charge", "amount", "buy"])
        components[0].click()
        components[1].send_keys("100as")
        components[2].click()

        assert driver.find_element_by_id("inValid") is not None

    def tearDown(self):
        self.driver.close()
