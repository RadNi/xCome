import unittest

from selenium import webdriver


class InternalTransactions(unittest.TestCase):

    def setUp(self):
        self.driver = webdriver.Firefox()

    def test_int_trans_rial(self):  # Assume Money > Needed
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/int-trans")
        payee_id = driver.find_element_by_id("payee-id")
        price = driver.find_element_by_id("price")
        trans_type = driver.find_element_by_id("type")
        submit = driver.find_element_by_id("submit")
        payee_id.send_keys("1111222233334444")
        price.send_keys("1000")
        trans_type.send_keys("rial")
        submit.click()

        assert driver.find_element_by_id("successful") is not None

    def test_int_trans_dollar(self):    # Assume Money > Needed
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/int-trans")
        payee_id = driver.find_element_by_id("payee-id")
        price = driver.find_element_by_id("price")
        trans_type = driver.find_element_by_id("type")
        submit = driver.find_element_by_id("submit")
        payee_id.send_keys("1111222233334444")
        price.send_keys("1000")
        trans_type.send_keys("dollar")
        submit.click()

        assert driver.find_element_by_id("successful") is not None

    def test_int_trans_euro(self):  # Assume Money > Needed
        driver = self.driver
        driver.get("http://127.0.0.1:8000/profile/int-trans")
        payee_id = driver.find_element_by_id("payee-id")
        price = driver.find_element_by_id("price")
        trans_type = driver.find_element_by_id("type")
        submit = driver.find_element_by_id("submit")
        payee_id.send_keys("1111222233334444")
        price.send_keys("1000")
        trans_type.send_keys("euro")
        submit.click()

        assert driver.find_element_by_id("successful") is not None

    def tearDown(self):
        self.driver.close()
